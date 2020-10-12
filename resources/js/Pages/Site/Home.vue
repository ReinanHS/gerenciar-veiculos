<template>
    <landing
        image="https://cdn.pixabay.com/photo/2020/05/10/10/09/fleet-5153286_1280.jpg"
        full-page="true"
    >
        <main
            class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28"
        >
            <div class="sm:text-center lg:text-left">
                <h2
                    class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl"
                >
                    Gestão de Frota
                    <br class="xl:hidden" />
                    <span class="text-indigo-600"
                        >Perfeito para suas necessidades</span
                    >
                </h2>
                <p
                    class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0"
                >
                    Manutenções preventivas ajudam a manter os custos baixos e
                    asseguram a disponibilidade e segurança dos seus veículos.
                </p>
                <div
                    class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start"
                >
                    <div class="rounded-md shadow">
                        <a
                            href="/home"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10"
                        >
                            Iniciar
                        </a>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <inertia-link
                            href="/register"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-300 transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10"
                        >
                            Criar uma conta
                        </inertia-link>
                    </div>
                </div>
            </div>
        </main>
    </landing>
</template>

<script>
import Landing from "@/Shared/Landing";
export default {
    components: {
        Landing,
    },
};
</script>
<style scoped>
main {
    margin-bottom: 12.3vh;
}

@media (min-width: 1024) {
    main {
        margin-bottom: 0em;
    }
}
</style>
