from pathlib import Path
lines = Path('resources/views/layouts/partials/header.blade.php').read_text(encoding='utf-8').splitlines()
for i in range(110, 160):
    print(f"{i+1}: {lines[i]}")
