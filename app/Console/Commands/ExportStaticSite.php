<?php

namespace App\Console\Commands;

use App\Http\Controllers\FrontendController;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use ReflectionMethod;

#[Signature('app:export-static-site {--base-url=https://suensereypanha-maker.github.io/third_Liva_skincare} {--out-dir=dist}')]
#[Description('Export Laravel views to static HTML files for GitHub Pages')]
class ExportStaticSite extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $baseUrl = rtrim((string) $this->option('base-url'), '/');
        $outDir = base_path((string) $this->option('out-dir'));

        $this->info("Exporting static site to: {$outDir}");
        $this->info("Base URL: {$baseUrl}");

        URL::forceRootUrl($baseUrl);
        if (str_starts_with($baseUrl, 'https://')) {
            URL::forceScheme('https');
        }

        if (! File::exists($outDir)) {
            File::makeDirectory($outDir, 0755, true);
        }

        $controller = new FrontendController;
        $refProducts = new ReflectionMethod($controller, 'getProducts');
        $refProducts->setAccessible(true);
        /** @var array<int, array<string, mixed>> $products */
        $products = $refProducts->invoke($controller);

        $locales = ['en', 'km'];

        foreach ($locales as $locale) {
            app()->setLocale($locale);
            $this->line("--- Rendering pages for locale: [{$locale}] ---");

            $pages = [
                '' => fn () => $controller->index(new Request),
                'products' => fn () => $controller->products(new Request),
                'about' => fn () => $controller->about(),
                'contact' => fn () => $controller->contact(),
                'wishlist' => fn () => $controller->wishlist(),
                'login' => fn () => $controller->login(),
                'register' => fn () => $controller->register(),
                'cart' => fn () => $controller->cart(),
                'checkout' => fn () => $controller->checkout(),
                'order-success' => fn () => $controller->orderSuccess(),
                'dashboard' => fn () => $controller->dashboard(),
            ];

            foreach ($products as $p) {
                $slug = $p['slug'];
                $pages['products/'.$slug] = fn () => $controller->productDetail($slug);
            }

            foreach ($pages as $path => $viewCallable) {
                $html = $viewCallable()->render();

                // Format links according to locale
                $html = $this->transformHtml($html, $locale, $path, $baseUrl);

                $targetRelPath = $locale === 'km' ? ($path !== '' ? 'km/'.$path : 'km') : $path;

                $this->savePage($outDir, $targetRelPath, $html);
            }
        }

        // Copy public assets
        $this->info('Copying public assets to dist...');
        $this->copyDirectory(public_path('build'), $outDir.'/build');
        $this->copyDirectory(public_path('img'), $outDir.'/img');
        if (File::exists(public_path('videos'))) {
            $this->copyDirectory(public_path('videos'), $outDir.'/videos');
        }

        if (File::exists(public_path('favicon.ico'))) {
            File::copy(public_path('favicon.ico'), $outDir.'/favicon.ico');
        }
        if (File::exists(public_path('robots.txt'))) {
            File::copy(public_path('robots.txt'), $outDir.'/robots.txt');
        }

        // Add .nojekyll for GitHub Pages
        File::put($outDir.'/.nojekyll', '');

        // Add 404.html (fallback to index.html)
        if (File::exists($outDir.'/index.html')) {
            File::copy($outDir.'/index.html', $outDir.'/404.html');
        }

        $this->info('Static export completed successfully!');

        return self::SUCCESS;
    }

    /**
     * Transform HTML to properly support static language switching and GitHub Pages subpath navigation.
     */
    protected function transformHtml(string $html, string $locale, string $currentPath, string $baseUrl): string
    {
        // 1. Language switcher route fixes
        $enUrl = $baseUrl.($currentPath ? '/'.$currentPath : '/');
        $kmUrl = $baseUrl.'/km'.($currentPath ? '/'.$currentPath : '/');

        // Replace route('lang.switch', 'en') and route('lang.switch', 'km')
        $html = str_replace(
            [
                $baseUrl.'/lang/en',
                $baseUrl.'/lang/km',
            ],
            [
                $enUrl,
                $kmUrl,
            ],
            $html
        );

        // 2. If in Khmer locale, rewrite internal page links to stay under /km
        if ($locale === 'km') {
            // Match href="$baseUrl/(...)" but not build, img, videos, lang, #
            $pattern = '~href="'.preg_quote($baseUrl, '~').'(/(?!build|img|videos|km|#|\.js|\.css)[^"\?]*)~';
            $html = preg_replace_callback($pattern, function ($matches) use ($baseUrl) {
                $sub = ltrim($matches[1], '/');

                return 'href="'.$baseUrl.'/km'.($sub !== '' ? '/'.$sub : '/');
            }, $html);
        }

        return $html;
    }

    /**
     * Save an HTML file under both directory/index.html and directory.html for GitHub Pages routing.
     */
    protected function savePage(string $outDir, string $relPath, string $html): void
    {
        if ($relPath === '' || $relPath === 'km') {
            $destDir = $relPath === '' ? $outDir : $outDir.'/'.$relPath;
            if (! File::exists($destDir)) {
                File::makeDirectory($destDir, 0755, true);
            }
            File::put($destDir.'/index.html', $html);
            $this->line("Saved: {$destDir}/index.html");

            return;
        }

        // Save as path/index.html
        $dir = $outDir.'/'.$relPath;
        if (! File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        File::put($dir.'/index.html', $html);

        // Also save as path.html for clean URLs without trailing slash
        $flatFile = $outDir.'/'.$relPath.'.html';
        $parent = dirname($flatFile);
        if (! File::exists($parent)) {
            File::makeDirectory($parent, 0755, true);
        }
        File::put($flatFile, $html);

        $this->line("Saved: {$relPath}/index.html and {$relPath}.html");
    }

    /**
     * Safely copy directory.
     */
    protected function copyDirectory(string $source, string $destination): void
    {
        if (! File::exists($source)) {
            return;
        }

        if (! File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        File::copyDirectory($source, $destination);
        $this->line("Copied directory: {$source} -> {$destination}");
    }
}
