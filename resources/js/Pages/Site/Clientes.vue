<template>
    <landing>
        <section class="pt-20 pb-48">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center text-center mb-24">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold">
                            Clientes
                        </h2>
                        <p class="text-lg leading-relaxed m-4 text-gray-600">
                            Essa é a lista de todos os nossos clientes. According to the National Oceanic and Atmospheric
                            Administration, Ted, Scambos, NSIDClead scentist,
                            puts the potentially record maximum.
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4" v-for="(user, index) in clientes" :key="index">
                        <div class="px-6">
                            <img
                                :alt="'Foto de '+user.name"
                                :src="'https://avatars.dicebear.com/api/initials/'+user.name+'.svg'"
                                class="shadow-lg rounded-full max-w-full mx-auto"
                                style="max-width: 120px"
                            />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">{{ user.name }}</h5>
                                <p
                                    class="mt-1 text-sm text-gray-500 uppercase font-semibold"
                                >
                                    Parceiro
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </landing>
</template>

<script>
import Landing from "@/Shared/Landing";
export default {
    props: ['clientes'],
    components: {
        Landing,
    },
};
</script>
