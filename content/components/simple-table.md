---
slug: simple-table
title: 'Simple Data Table'
category: tables
github: caresome
---

<div class="p-8">
  <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-700">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
      <thead class="bg-gray-50 dark:bg-gray-800">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Name</th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Email</th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Role</th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Status</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
        <tr>
          <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">Jane Cooper</td>
          <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 dark:text-gray-400">jane@example.com</td>
          <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 dark:text-gray-400">Admin</td>
          <td class="whitespace-nowrap px-6 py-4"><span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800 dark:bg-green-900 dark:text-green-200">Active</span></td>
        </tr>
        <tr>
          <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">John Smith</td>
          <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 dark:text-gray-400">john@example.com</td>
          <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 dark:text-gray-400">User</td>
          <td class="whitespace-nowrap px-6 py-4"><span class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">Pending</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
