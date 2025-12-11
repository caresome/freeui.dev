# FreeUI

Free, open-source Tailwind CSS and Alpine.js components.

**[Browse Components →](https://freeui.dev)**

## Built With

- **Tailwind CSS** 4.0
- **Alpine.js** 3.x

## Categories

| Collection    | Categories                                  |
| ------------- | ------------------------------------------- |
| `application` | `app-shells`, `cards`, `headings`, `voting` |

## How to Contribute

Create a markdown file in `content/components/`:

```markdown
---
slug: your-username-component-name
title: Component Name
category: cards
github: your-github-username
dependencies: []
publish_at: 2025-01-01 00:00:00
---

<div class="rounded-xl border border-neutral-200/80 bg-white p-6 shadow-sm dark:border-neutral-800/80 dark:bg-neutral-900">
    <h2 class="text-xl font-bold text-neutral-900 dark:text-white">Hello World</h2>
</div>
```

Submit a PR and we'll review it!

## Rules

1. **Dark mode required** - Use `dark:` variants
2. **Accessible** - Semantic HTML, ARIA where needed
3. **Tailwind only** - No custom CSS frameworks
4. **CDNs allowed** - Alpine.js & Tailwind included automatically. For other libraries, list CDN URLs in `dependencies`
5. **Self-contained** - Inline scripts/styles allowed

## New Categories

Want a new category? Create it in `content/categories/`:

```markdown
---
title: Category Name
slug: category-slug
collection: application
description: Brief description of the category.
icon: heroicon-o-icon-name
---
```

## License

MIT
