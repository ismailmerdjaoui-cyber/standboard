from pathlib import Path
path = Path('resources/views/layouts/app.blade.php')
text = path.read_text(encoding='utf-8')
start = text.index('<!-- Start Switcher -->')
end = text.index('<!-- End Switcher -->') + len('<!-- End Switcher -->')
text = text[:start] + text[end:]
text = text.replace('    <div class="progress-top-bar"></div>\n', '')
path.write_text(text, encoding='utf-8')
