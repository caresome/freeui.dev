---
slug: simple-form
title: 'Simple Contact Form'
category: forms
github: caresome
---

<div class="mx-auto max-w-md p-8">
  <form class="space-y-6">
    <div>
      <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" id="name" name="name" class="mt-2 block w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" placeholder="John Doe">
    </div>
    <div>
      <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
      <input type="email" id="email" name="email" class="mt-2 block w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" placeholder="john@example.com">
    </div>
    <div>
      <label for="message" class="block text-sm font-medium text-gray-900 dark:text-white">Message</label>
      <textarea id="message" name="message" rows="4" class="mt-2 block w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" placeholder="Your message..."></textarea>
    </div>
    <button type="submit" class="w-full rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
      Send Message
    </button>
  </form>
</div>
