from pathlib import Path
path = Path('resources/views/layouts/app.blade.php')
text = path.read_text(encoding='utf-8')
start = text.index('    <div class="progress-top-bar"></div>')
# remove switcher block
switcher_start = text.index('<!-- Start Switcher -->')
switcher_end = text.index('<!-- End Switcher -->') + len('<!-- End Switcher -->')
text = text[:switcher_start] + text[switcher_end:]
path.write_text(text, encoding='utf-8')
