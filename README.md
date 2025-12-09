# FreeUI

Free, open-source Tailwind CSS components.

## How to Contribute

Create a markdown file in `content/components/`:

```markdown
---
slug: your-username-component-name
title: Component Name
category: hero-sections
github: your-github-username
---

<section class="bg-white dark:bg-gray-900 py-24">
  <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
    Hello World
  </h1>
</section>
```

That's it! Submit a PR.

## Rules

1. **Dark mode required** - Use `dark:` variants
2. **Accessible** - Semantic HTML, ARIA where needed
3. **Tailwind only** - No custom CSS frameworks
4. **CDNs allowed** - Alpine.js is included, other CDNs (GSAP, etc.) are fine
5. **Inline scripts/styles allowed** - Keep it self-contained

## Categories

| Collection    | Categories                            |
| ------------- | ------------------------------------- |
| `marketing`   | `hero-sections`, `navbars`, `pricing` |
| `ecommerce`   | `product-cards`, `carts`              |
| `application` | `buttons`, `forms`, `tables`          |

## License

MIT
