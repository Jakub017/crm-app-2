<template>
    <div
        class="flex items-start flex-col gap-2 lg:flex-row lg:items-center lg:justify-between w-full mb-6"
    >
        <div class="flex flex-col gap-1">
            <h1 class="text-xl font-semibold leading-6 text-secondary-dark">
                <slot name="title"></slot>
            </h1>
            <p class="text-sm font-medium text-gray-500">
                <slot name="description"></slot>
            </p>
        </div>
        <slot name="action"></slot>
    </div>
</template>
