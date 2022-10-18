<template>
    <nav
        aria-label="secondary"
        :class="[
            'sticky top-0 z-10 px-6 py-4 bg-white flex items-center justify-between transition-transform duration-500',
            {
                '-translate-y-full': scrolling.down,
                'translate-y-0': scrolling.up,
            },
        ]"
    >
        <div class="flex items-center gap-2">
            <Button
                iconOnly
                variant="secondary"
                @click="toggleDarkMode"
                v-slot="{ iconSizeClasses }"
                class="md:hidden"
                srText="Toggle dark mode"
            >
                <MoonIcon v-show="!isDark" aria-hidden="true" :class="iconSizeClasses" />
                <SunIcon v-show="isDark" aria-hidden="true" :class="iconSizeClasses" />
            </Button>
        </div>

        <div class="flex items-center gap-2">
            <Button
                iconOnly
                variant="secondary"
                @click="toggleFullScreen"
                v-slot="{ iconSizeClasses }"
                class="hidden md:inline-flex"
                srText="Toggle dark mode"
            >
                <ArrowsExpandIcon
                    v-show="!isFullscreen"
                    aria-hidden="true"
                    :class="iconSizeClasses"
                />
                <ArrowsInnerIcon v-show="isFullscreen" aria-hidden="true" :class="iconSizeClasses" />
            </Button>

        </div>
    </nav>

    <!-- Mobile bottom bar -->
    <div
        :class="[
            'fixed inset-x-0 bottom-0 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-white md:hidden',
            {
                'translate-y-full': scrolling.down,
                'translate-y-0': scrolling.up,
            },
        ]"
    >
        <Button iconOnly variant="secondary" v-slot="{ iconSizeClasses }" srText="Search">
            <SearchIcon aria-hidden="true" :class="iconSizeClasses" />
        </Button>

        <router-link :to="{ name: 'Dashboard' }">
            <Logo class="w-10 h-10" />
            <span class="sr-only">K UI</span>
        </router-link>

        <Button
            iconOnly
            variant="secondary"
            @click="sidebarState.isOpen = !sidebarState.isOpen"
            v-slot="{ iconSizeClasses }"
            class="md:hidden"
            srText="Search"
        >
            <MenuIcon v-show="!sidebarState.isOpen" aria-hidden="true" :class="iconSizeClasses" />
            <XIcon v-show="sidebarState.isOpen" aria-hidden="true" :class="iconSizeClasses" />
        </Button>
    </div>
</template>

<script setup>
import { onMounted, onUnmounted } from 'vue'
import { useFullscreen } from '@vueuse/core'
import {
    SunIcon,
    MoonIcon,
    SearchIcon,
    MenuIcon,
    XIcon,
    ArrowsExpandIcon
} from '@heroicons/vue/outline'
import {
    handleScroll,
    isDark,
    scrolling,
    toggleDarkMode,
    sidebarState,
} from '@/Dashboard/composables'
import Button from '@/Dashboard/components/Button.vue'
import Logo from '@/Dashboard/components/Logo.vue'
import Dropdown from '@/Dashboard/components/Dropdown.vue'
import DropdownLink from '@/Dashboard/components/DropdownLink.vue'
import { ArrowsInnerIcon } from '@/Dashboard/components/icons/outline'

const { isFullscreen, toggle: toggleFullScreen } = useFullscreen()

onMounted(() => {
    document.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
    document.removeEventListener('scroll', handleScroll)
})
</script>
