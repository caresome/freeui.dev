---
slug: stats-card-with-chart
title: Stats Card with Chart
category: cards
github: caresome
dependencies: []
publish_at: 2025-12-07 04:00:00
---

<style>
    @keyframes draw-line {
        from {
            stroke-dashoffset: 200;
        }
        to {
            stroke-dashoffset: 0;
        }
    }
    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    .sparkline-line {
        stroke-dasharray: 200;
        stroke-dashoffset: 200;
        animation: draw-line 1s ease-out forwards;
    }
    .sparkline-area {
        opacity: 0;
        animation: fade-in 0.8s ease-out 0.3s forwards;
    }
    .sparkline-dot {
        opacity: 0;
        transition:
            opacity 0.15s ease-out,
            transform 0.15s ease-out;
    }
    .sparkline-container:hover .sparkline-dot {
        opacity: 1;
    }
    .sparkline-dot:hover {
        transform: scale(1.5);
    }
</style>

<div data-preview-only class="mx-auto max-w-sm">
    <div
        x-data="{
            data: [28, 42, 35, 48, 38, 55, 62, 58, 72, 68, 78, 85],
            hoveredIndex: null,
            get chartPath() {
                const width = 120;
                const height = 48;
                const padding = 4;
                const maxVal = Math.max(...this.data);
                const minVal = Math.min(...this.data);
                const range = maxVal - minVal || 1;

                const points = this.data.map((val, i) => {
                    const x = padding + (i / (this.data.length - 1)) * (width - padding * 2);
                    const y = padding + ((maxVal - val) / range) * (height - padding * 2);
                    return { x, y };
                });

                // Create smooth bezier curve
                let path = `M ${points[0].x} ${points[0].y}`;
                for (let i = 0; i < points.length - 1; i++) {
                    const p0 = points[i];
                    const p1 = points[i + 1];
                    const cpx = (p0.x + p1.x) / 2;
                    path += ` C ${cpx} ${p0.y}, ${cpx} ${p1.y}, ${p1.x} ${p1.y}`;
                }
                return path;
            },
            get areaPath() {
                const width = 120;
                const height = 48;
                const padding = 4;
                const maxVal = Math.max(...this.data);
                const minVal = Math.min(...this.data);
                const range = maxVal - minVal || 1;

                const points = this.data.map((val, i) => {
                    const x = padding + (i / (this.data.length - 1)) * (width - padding * 2);
                    const y = padding + ((maxVal - val) / range) * (height - padding * 2);
                    return { x, y };
                });

                let path = `M ${points[0].x} ${height}`;
                path += ` L ${points[0].x} ${points[0].y}`;
                for (let i = 0; i < points.length - 1; i++) {
                    const p0 = points[i];
                    const p1 = points[i + 1];
                    const cpx = (p0.x + p1.x) / 2;
                    path += ` C ${cpx} ${p0.y}, ${cpx} ${p1.y}, ${p1.x} ${p1.y}`;
                }
                path += ` L ${points[points.length - 1].x} ${height} Z`;
                return path;
            },
            getPointCoords(index) {
                const width = 120;
                const height = 48;
                const padding = 4;
                const maxVal = Math.max(...this.data);
                const minVal = Math.min(...this.data);
                const range = maxVal - minVal || 1;

                const x = padding + (index / (this.data.length - 1)) * (width - padding * 2);
                const y = padding + ((maxVal - this.data[index]) / range) * (height - padding * 2);
                return { x, y };
            }
        }"
        class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    >
        <div class="flex items-start justify-between gap-4">
            <div class="min-w-0">
                <p class="text-sm font-medium text-neutral-500 dark:text-neutral-400">Page Views</p>
                <p class="mt-2 text-3xl font-bold tracking-tight text-neutral-900 dark:text-neutral-50">48.2K</p>
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">
                    <span class="font-medium text-green-600 dark:text-green-400">+8.2%</span>
                    vs last week
                </p>
            </div>
            <div class="sparkline-container relative h-12 w-[120px] shrink-0">
                <svg
                    class="h-full w-full overflow-visible"
                    viewBox="0 0 120 48"
                    fill="none"
                    role="img"
                    aria-label="Page views trend chart showing growth over 12 data points"
                >
                    <!-- Gradient definition -->
                    <defs>
                        <linearGradient id="sparkline-gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop
                                offset="0%"
                                class="[stop-color:theme(colors.neutral.900)] dark:[stop-color:theme(colors.neutral.50)]"
                                stop-opacity="0.15"
                            />
                            <stop
                                offset="100%"
                                class="[stop-color:theme(colors.neutral.900)] dark:[stop-color:theme(colors.neutral.50)]"
                                stop-opacity="0"
                            />
                        </linearGradient>
                    </defs>

                    <!-- Area fill with gradient -->
                    <path :d="areaPath" fill="url(#sparkline-gradient)" class="sparkline-area" />

                    <!-- Line -->
                    <path
                        :d="chartPath"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        fill="none"
                        class="sparkline-line text-neutral-900 dark:text-neutral-50"
                    />

                    <!-- Interactive dots -->
                    <template x-for="(value, index) in data" :key="index">
                        <circle
                            :cx="getPointCoords(index).x"
                            :cy="getPointCoords(index).y"
                            r="3"
                            fill="currentColor"
                            class="sparkline-dot cursor-pointer text-neutral-900 dark:text-neutral-50"
                            @mouseenter="hoveredIndex = index"
                            @mouseleave="hoveredIndex = null"
                        />
                    </template>
                </svg>

                <!-- Tooltip -->
                <div
                    x-show="hoveredIndex !== null"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="pointer-events-none absolute -top-8 left-1/2 z-10 -translate-x-1/2 rounded-md bg-neutral-900 px-2 py-1 text-xs font-medium text-white shadow-lg dark:bg-white dark:text-neutral-900"
                    :style="hoveredIndex !== null ? `left: ${getPointCoords(hoveredIndex).x}px` : ''"
                >
                    <span x-text="hoveredIndex !== null ? data[hoveredIndex] + 'K' : ''"></span>
                </div>
            </div>
        </div>
    </div>
</div>
