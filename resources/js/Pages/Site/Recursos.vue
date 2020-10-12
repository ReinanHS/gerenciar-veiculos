<template>
    <landing>
        <section class="mt-8">
            <div
                class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                style="height: 80px; transform: translateZ(0)"
            >
                <svg class="absolute bottom-0 overflow-hidden" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4zm4.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
                </svg>
            </div>
            <div class="container mx-auto px-4">
                <div class="items-center flex flex-wrap">
                    <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                        <img
                            alt="Foto das informações"
                            class="max-w-full rounded-lg shadow-lg"
                            :src="image"
                        />
                    </div>
                    <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                        <div class="md:pr-12">
                            <div
                                class="text-indigo-200 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-indigo-600"
                            >
                                <svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4zm4.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-semibold">
                                Otimize o uso da frota
                            </h3>
                            <p
                                class="mt-4 text-lg leading-relaxed text-gray-600"
                            >
                                Decisões certas necessitam de dados certos. Controle as atividades de sua frota e entenda-a. Não perca dinheiro com a sua frota e tenha ela sempre em ordem!
                            </p>
                            <ul class="list-none mt-6">
                                <li class="py-2" v-for="(info, index) in infos" :key="index">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-indigo-600 mr-3"
                                                ></span>
                                        </div>
                                        <div>
                                            <h4 class="text-gray-600">
                                               {{ info }}
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
    components: {
        Landing,
    },
    data(){
        return {
            infos: [
                'Cadastro de veículos',
                'Mantenha controle de todos os gastos',
                'Fácil acesso aos dados e todo o histórico',
                'Cadastro de motoristas',
            ],
            image: 'https://cdn.pixabay.com/photo/2014/10/22/17/18/girl-498238_1280.jpg',
        }
    }
};
</script>
