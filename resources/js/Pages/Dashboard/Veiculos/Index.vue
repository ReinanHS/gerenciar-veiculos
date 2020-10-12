<template>
    <dashboard>
        <div class="flex flex-col">
            <div class="mt-3 mb-3 flex flex-col sm:flex-row">
                <div class="flex">
                    <div class="relative">
                        <select
                            v-model="filter.paginacao"
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        >
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                        >
                            <svg
                                class="fill-current h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                    <div class="relative">
                        <select
                            v-model="filter.status"
                            class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
                        >
                            <option value="all">Todos</option>
                            <option value="disponível">Disponível</option>
                            <option value="quebrado">Quebrado</option>
                            <option value="manutenção">Manutenção</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                        >
                            <svg
                                class="fill-current h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="block relative mt-2 sm:mt-0">
                    <span
                        class="absolute inset-y-0 left-0 flex items-center pl-2"
                        ><svg
                            viewBox="0 0 24 24"
                            class="h-4 w-4 fill-current text-gray-500"
                        >
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"
                            ></path></svg></span
                    ><input
                        v-model="filter.pesquisa"
                        placeholder="Pesquisa"
                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
                    />
                </div>
                <div class="block relative mt-2 sm:mt-0 ml-4">
                    <inertia-link :href="$route('veiculos.create')"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-400 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                    >
                        Cadastrar veículo
                    </inertia-link>
                </div>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                >
                    <div
                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                    >
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Nome
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Informações
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Status
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="(veiculo, index) in filtered"
                                    :key="index"
                                >
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10"
                                            >
                                                <img
                                                    class="h-10 w-10 rounded-full"
                                                    src="https://i.pinimg.com/236x/46/ba/67/46ba6710fab250447be5344c18957a7e.jpg"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="ml-4">
                                                <div
                                                    class="text-sm leading-5 font-medium text-gray-900"
                                                >
                                                    {{ veiculo.marca }}
                                                </div>
                                                <div
                                                    class="text-sm leading-5 text-gray-500"
                                                >
                                                    {{ veiculo.modelo }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div
                                            class="text-sm leading-5 text-gray-900"
                                        >
                                            Placa:
                                            {{ placaFormat(veiculo.placa) }}
                                        </div>
                                        <div
                                            class="text-sm leading-5 text-gray-500"
                                        >
                                            Chassi: {{ veiculo.chassi }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <span
                                            :class="{
                                                'bg-green-100 text-green-800':
                                                    veiculo.status ==
                                                    'disponível',
                                                'bg-yellow-100 text-yellow-800':
                                                    veiculo.status ==
                                                    'manutenção',
                                                'bg-red-100 text-red-800':
                                                    veiculo.status ==
                                                    'quebrado',
                                            }"
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                        >
                                            {{ veiculo.status }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium"
                                    >
                                        <inertia-link
                                            :href="
                                                $route(
                                                    'veiculos.edit',
                                                    veiculo.placa
                                                )
                                            "
                                            class="text-indigo-600 hover:text-indigo-900"
                                            >Editar</inertia-link
                                        >
                                        <button
                                            @click="modalDelete(veiculo)"
                                            class="text-red-400 hover:text-red-500"
                                        >
                                            Deletar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div
                            class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between"
                        >
                            <span class="text-xs xs:text-sm text-gray-900"
                                >Mostrando {{ veiculos.current_page }} de
                                {{ veiculos.last_page }} no total de
                                {{ veiculos.total }} veículos</span
                            >
                            <div class="inline-flex mt-2 xs:mt-0">
                                <inertia-link
                                    v-if="veiculos.prev_page_url"
                                    :href="veiculos.prev_page_url"
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l"
                                >
                                    Anterior</inertia-link
                                ><inertia-link
                                    v-if="veiculos.next_page_url"
                                    :href="veiculos.next_page_url"
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r"
                                >
                                    Próximo
                                </inertia-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal-delete ref="modal"></modal-delete>
    </dashboard>
</template>

<script>
import Dashboard from "@/Shared/Dashboard";
import ModalDelete from "@/components/ModalDelete";
export default {
    props: ["veiculos"],
    components: {
        Dashboard,
        ModalDelete,
    },
    data() {
        return {
            filter: {
                status: "all",
                pesquisa: "",
                paginacao: 20,
            },
        };
    },
    computed: {
        filtered() {
            return this.veiculos.data
                .filter((veiculo) => {
                    const placa = this.removeAcentos(
                        veiculo.placa.toLowerCase()
                    );
                    const modelo = this.removeAcentos(
                        veiculo.modelo.toLowerCase()
                    );
                    const marca = this.removeAcentos(
                        veiculo.marca.toLowerCase()
                    );
                    const status = this.removeAcentos(
                        veiculo.status.toLowerCase()
                    );
                    const chassi = this.removeAcentos(
                        veiculo.chassi.toLowerCase()
                    );
                    const searchTerm = this.removeAcentos(
                        this.filter.pesquisa.toLowerCase()
                    );

                    if (this.filter.status == "all") {
                        return (
                            placa.includes(searchTerm) ||
                            modelo.includes(searchTerm) ||
                            marca.includes(searchTerm) ||
                            chassi.includes(searchTerm) ||
                            status.includes(searchTerm)
                        );
                    } else {
                        return (
                            (placa.includes(searchTerm) ||
                                modelo.includes(searchTerm) ||
                                marca.includes(searchTerm) ||
                                chassi.includes(searchTerm)) &&
                            veiculo.status == this.filter.status
                        );
                    }
                })
                .slice(0, this.filter.paginacao);
        },
    },
    methods: {
        modalDelete: function (veiculo) {
            this.$refs.modal.showModal(veiculo);
        },
        placaFormat: function (placa) {
            return placa.slice(0, 3).toUpperCase() + "-" + placa.slice(3);
        },
        removeAcentos: function (text) {
            const a = "àáäâãèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;";
            const b = "aaaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------";
            const p = new RegExp(a.split("").join("|"), "g");
            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(p, (c) => b.charAt(a.indexOf(c))) // Replace special chars
                .replace(/&/g, "-and-") // Replace & with 'and'
                .replace(/[\s\W-]+/g, "-"); // Replace spaces, non-word characters and dashes with a single dash (-)
        },
    },
};
</script>
