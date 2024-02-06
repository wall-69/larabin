<template>
    <header>
        <nav class="navbar min-h-0">
            <!-- Create/new -->
            <Link
                href="/"
                method="get"
                as="button"
                type="button"
                :disabled="!hasContent"
            >
                <i class="bx bxs-file-plus bx-md"></i>
            </Link>

            <!-- Save -->
            <Link
                href="/"
                method="post"
                as="button"
                type="button"
                :disabled="!hasContent || hasPaste"
                :data="{ content }"
                @click="editing = false"
            >
                <i class="bx bxs-save bx-md"></i>
            </Link>

            <!-- Edit -->
            <button :disabled="!hasPaste" @click="editing = true">
                <i class="bx bxs-edit bx-md"></i>
            </button>

            <!-- Logo -->
            <Link href="/" class="hover:opacity-100 ml-auto opacity-75">
                <img :src="logo" alt="Logo" class="h-10" />
            </Link>
        </nav>
    </header>

    <hr />

    <main class="flex flex-1 p-2 mt-2">
        <textarea
            v-model="content"
            :readonly="hasPaste"
            autofocus
            class="read-only:cursor-default overflow-x-clip flex-1 w-full min-h-full px-2 bg-transparent outline-none resize-none"
        ></textarea>
    </main>

    <footer>
        <p class="font-bold text-center">&copy; Tomáš Kriško 2024</p>
    </footer>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const props = defineProps({
    paste: {
        type: String,
        required: false,
    },
});

const logo = "/img/logo.png";
const editing = ref(false);

const hasPaste = computed(() => {
    return props.paste && !editing.value ? true : false;
});

const content = ref(props.paste ? props.paste : "");
const hasContent = computed(() => {
    return content.value.trim().length !== 0;
});
</script>
