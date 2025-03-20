<template>
    <div
        class="bg-white p-4 rounded-lg flex items-center justify-start gap-4 col-span-12 md:col-span-6 lg:col-span-3 border-[1px] border-gray-200"
    >
        <div
            class="size-14 flex justify-center items-center bg-indigo-100 rounded-lg"
        >
            <i class="fa-solid fa-users text-indigo-700 text-xl"></i>
        </div>
        <div class="flex flex-col gap-1 w-[calc(100%-50px)]">
            <h3 class="text-base font-semibold text-gray-900">
                <slot name="title"></slot>
            </h3>
            <p class="text-sm text-gray-500">
                <slot name="description"></slot>
            </p>
        </div>
    </div>
</template>
