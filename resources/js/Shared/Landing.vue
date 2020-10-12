<template>
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-screen-xl mx-auto">
            <div
                :class="{'lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32': fullPage}"
                class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20"
            >
                <svg
                    class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                    fill="currentColor"
                    viewBox="0 0 100 100"
                    preserveAspectRatio="none"
                >
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>

                <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                    <nav
                        class="relative flex items-center justify-between sm:h-10 lg:justify-start"
                    >
                        <div
                            class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0"
                        >
                            <div
                                class="flex items-center justify-between w-full md:w-auto"
                            >
                                <inertia-link href="/" aria-label="Home">
                                    <img
                                        class="h-8 w-auto sm:h-10"
                                        src="https://tailwindui.com/img/logos/workflow-mark-on-white.svg"
                                        alt="Logo"
                                    />
                                </inertia-link>
                                <div class="-mr-2 flex items-center md:hidden">
                                    <button
                                        type="button"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                        id="main-menu"
                                        aria-label="Main menu"
                                        aria-haspopup="true"
                                        @click="isOpen = !isOpen"
                                    >
                                        <svg
                                            class="h-6 w-6"
                                            stroke="currentColor"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block md:ml-10 md:pr-4">
                            <inertia-link
                                v-for="(link,index) in menus"
                                :key="index"
                                :href="link.to"
                                :class="{'ml-8': index > 0, 'text-gray-700': $page.url == link.to, 'text-gray-500': $page.url != link.to}"
                                class="font-medium hover:text-gray-900 transition duration-150 ease-in-out"
                                >{{ link.name }}</inertia-link
                            >
                            <a
                                href="/login"
                                class="ml-8 font-medium text-indigo-600 hover:text-indigo-900 transition duration-150 ease-in-out"
                                >Login</a
                            >
                        </div>
                    </nav>
                </div>

                <div v-show="isOpen"
                    class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                >
                    <div class="rounded-lg shadow-md">
                        <div
                            class="rounded-lg bg-white shadow-xs overflow-hidden"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="main-menu"
                        >
                            <div
                                class="px-5 pt-4 flex items-center justify-between"
                            >
                                <div>
                                    <img
                                        class="h-8 w-auto"
                                        src="https://tailwindui.com/img/logos/workflow-mark-on-white.svg"
                                        alt=""
                                    />
                                </div>
                                <div class="-mr-2">
                                    <button
                                        type="button"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                        aria-label="Close menu"
                                        @click="isOpen = !isOpen"
                                    >
                                        <svg
                                            class="h-6 w-6"
                                            stroke="currentColor"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="px-2 pt-2 pb-3">
                                <inertia-link
                                    v-for="(link,index) in menus"
                                    :key="index"
                                    :href="link.to"
                                    :class="{'mt-1': index > 0}"
                                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                                    role="menuitem"
                                    >{{ link.name }}</inertia-link
                                >
                            </div>
                            <div>
                                <a
                                    href="/login"
                                    class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700 transition duration-150 ease-in-out"
                                    role="menuitem"
                                >
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <slot></slot>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2" v-if="fullPage">
            <img
                class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
                :src="image"
                alt=""
            />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        image: {
            type: String,
            default(){
                return ''
            }
        },
        fullPage: {
            type: Boolean,
            default(){
                return false
            }
        }
    },
    data(){
        return {
            isOpen: false,
            menus: [
                {name: 'Home',      to: '/'},
                {name: 'Recursos',  to: '/recursos'},
                {name: 'Preços',    to: '/precos'},
                {name: 'Clientes',  to: '/clientes'},
            ],
        }
    }
};
</script>
