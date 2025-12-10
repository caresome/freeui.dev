# FreeUI

Free, open-source Tailwind CSS components.

## Built With

Components are built and tested with:

- **Tailwind CSS** 4.0
- **Alpine.js** 3.x

Components may work with older versions but are primarily developed against the above.

## How to Contribute

Create a markdown file in `content/components/`:

```markdown
---
slug: your-username-component-name
title: Component Name
category: cards
github: your-github-username
---

<div class="p-8">
  <div class="rounded-xl border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-900">
    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Hello World</h2>
  </div>
</div>
```

That's it! Submit a PR.

## Rules

1. **Dark mode required** - Use `dark:` variants
2. **Accessible** - Semantic HTML, ARIA where needed
3. **Tailwind only** - No custom CSS frameworks
4. **CDNs allowed** - Alpine.js is included, other CDNs (GSAP, etc.) are fine
5. **Inline scripts/styles allowed** - Keep it self-contained

## Categories

| Collection    | Categories |
| ------------- | ---------- |
| `application` | `cards`    |

Want a new category? Create it in `content/categories/` with your PR.

## License

MIT
