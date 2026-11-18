# Everyday ritual motion study

This original LIVA concept artwork was generated for the website with OpenAI
image generation. It is a concept product scene, not footage of a manufactured
product or a claim about an existing product formulation.

`everyday-film-source.png` is the unmodified generated still (1672 × 941).
`everyday-film.mp4` is a locally authored 10-second ambient motion study created
with FFmpeg from that still. The camera breathes by 1.5% over one complete cycle;
subtle horizontal water movement is confined below the stone ledge. This is not
neural video generation or live-action footage. There is no audio.

Deliverables:

- `everyday-film.mp4`: 1280 × 720, 24 fps, H.264, YUV 4:2:0, fast-start MP4.
- `everyday-film-mobile.mp4`: 768 × 432, 24 fps, same loop at a smaller file size.
- `everyday-poster.webp`: the first encoded frame, for loading and reduced-motion fallback.

Both camera and water motion have a 10-second period. The final frame is one
frame before the start of the next cycle, allowing continuous loop playback.
Because the scene begins as a still, only the authored camera and water movement
are present; it does not simulate full fluid dynamics or changing 3D lighting.

To reproduce, run `bash scripts/render-hero-film.sh` from the repository. FFmpeg
must include the libx264 and libwebp encoders. A replacement source path may be
passed as the first argument, but the water mask is authored for this composition.

Generated source session: `01a1d3e4-2e0f-7fc2-bb54-91ee56b61106`.
Generated image: `exec-78ce60b0-c51c-4bb5-ae05-be0e1ffa18cb.png`.
