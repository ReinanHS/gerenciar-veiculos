<template>
    <dashboard>
        <div class="mt-8">
            <h4 class="text-gray-600">Formulário</h4>
            <div class="mt-4">
                <div class="p-6 bg-white rounded-md shadow-md">
                    <h2 class="text-lg text-gray-700 font-semibold capitalize">
                        Criar veículo
                    </h2>
                    <form @submit.prevent.stop="validation">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label class="text-gray-700" for="placa-input"
                                    >Placa</label
                                ><input
                                    class="form-input w-full mt-2 rounded-md focus:border-indigo-600"
                                    :class="{
                                        'is-invalid': errors.placa,
                                        'is-valid': inputs.placa.length == 7,
                                    }"
                                    v-model="inputs.placa"
                                    name="placa"
                                    required
                                    autofocus
                                    id="placa-input"
                                    aria-describedby="placaHelp"
                                    type="text"
                                    placeholder="Placa"
                                />
                                <span
                                    v-if="errors.placa"
                                    class="mt-2 mb-2 text-center text-sm leading-5 text-gray-600"
                                    role="alert"
                                >
                                    <strong>{{ errors.placa }}</strong>
                                </span>
                            </div>
                            <div>
                                <label class="text-gray-700" for="modelo-input"
                                    >Modelo</label
                                ><input
                                    class="form-input w-full mt-2 rounded-md focus:border-indigo-600"
                                    :class="{
                                        'is-invalid': errors.modelo,
                                        'is-valid': inputs.modelo.length > 4,
                                    }"
                                    v-model="inputs.modelo"
                                    name="modelo"
                                    required
                                    id="modelo-input"
                                    aria-describedby="modeloHelp"
                                    type="text"
                                    placeholder="Modelo"
                                />
                                <span
                                    v-if="errors.modelo"
                                    class="mt-2 mb-2 text-center text-sm leading-5 text-gray-600"
                                    role="alert"
                                >
                                    <strong>{{ errors.modelo }}</strong>
                                </span>
                            </div>
                            <div>
                                <label class="text-gray-700" for="marca-input"
                                    >Marca</label
                                ><input
                                    class="form-input w-full mt-2 rounded-md focus:border-indigo-600"
                                    :class="{
                                        'is-invalid': errors.marca,
                                        'is-valid': inputs.marca.length > 4,
                                    }"
                                    v-model="inputs.marca"
                                    name="marca"
                                    required
                                    id="marca-input"
                                    aria-describedby="marcaHelp"
                                    type="text"
                                    placeholder="Marca"
                                />
                                <span
                                    v-if="errors.marca"
                                    class="mt-2 mb-2 text-center text-sm leading-5 text-gray-600"
                                    role="alert"
                                >
                                    <strong>{{ errors.marca }}</strong>
                                </span>
                            </div>
                            <div>
                                <label
                                    class="text-gray-700"
                                    for="passwordConfirmation"
                                    >Chassi</label
                                ><input
                                    class="form-input w-full mt-2 rounded-md focus:border-indigo-600"
                                    :class="{
                                        'is-invalid': errors.chassi,
                                        'is-valid': inputs.chassi.length == 17,
                                    }"
                                    v-model="inputs.chassi"
                                    name="chassi"
                                    required
                                    id="chassi-input"
                                    aria-describedby="chassiHelp"
                                    type="text"
                                    placeholder="Marca"
                                />
                                <span
                                    v-if="errors.chassi"
                                    class="mt-2 mb-2 text-center text-sm leading-5 text-gray-600"
                                    role="alert"
                                >
                                    <strong>{{ errors.chassi }}</strong>
                                </span>
                            </div>
                            <div>
                                <label class="text-gray-700" for="status-select"
                                    >Status</label
                                >
                                <div class="relative">
                                    <select
                                        class="appearance-none h-full rounded-r appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
                                        id="status-select"
                                        name="status"
                                        v-model="inputs.status"
                                    >
                                        <option value="disponível">
                                            Disponível
                                        </option>
                                        <option value="quebrado">
                                            Quebrado
                                        </option>
                                        <option value="manutenção">
                                            Manutenção
                                        </option>
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
                                <span
                                    v-if="errors.chassi"
                                    class="mt-2 mb-2 text-center text-sm leading-5 text-gray-600"
                                    role="alert"
                                >
                                    <strong>{{ errors.chassi }}</strong>
                                </span>
                            </div>
                            <div v-if="vehicle.status != inputs.status">
                                <label
                                    class="text-gray-700"
                                    for="observacao-input"
                                    >Observação do status</label
                                ><input
                                    class="form-input w-full mt-2 rounded-md focus:border-indigo-600"
                                    :class="{
                                        'is-invalid': errors.chassi,
                                        'is-valid': inputs.chassi.length > 5,
                                    }"
                                    v-model="inputs.observacao"
                                    name="observacao"
                                    required
                                    id="observacao-input"
                                    aria-describedby="observacaoHelp"
                                    type="text"
                                    placeholder="Observação do status"
                                />
                                <span
                                    v-if="errors.observacao"
                                    class="mt-2 mb-2 text-center text-sm leading-5 text-gray-600"
                                    role="alert"
                                >
                                    <strong>{{ errors.observacao }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button
                                class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                            >
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div
            v-if="consulta"
            class="mt-4 bg-white shadow overflow-hidden sm:rounded-lg"
        >
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Informações do Detran
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    Personal details and application.
                </p>
            </div>
            <div>
                <dl>
                    <div
                        class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Municipio
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                        >
                            {{ consulta.municipio }}
                        </dd>
                    </div>
                    <div
                        class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Cor
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                        >
                            {{ consulta.cor }}
                        </dd>
                    </div>
                    <div
                        class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Estado
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                        >
                            {{ consulta.uf }}
                        </dd>
                    </div>
                    <div
                        class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                    >
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Ano do Modelo
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2"
                        >
                            {{ consulta.anoModelo }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </dashboard>
</template>

<script>
import Dashboard from "@/Shared/Dashboard";
export default {
    props: ["errors", "vehicle"],
    components: {
        Dashboard,
    },
    mounted() {
        this.inputs = {
            ...this.inputs,
            ...this.vehicle,
        };

        if(this.inputs.placa != ''){
            this.validarPlaca()
        }
    },
    data() {
        return {
            oldStatus: "",
            inputs: {
                chassi: "",
                status: "disponível",
                marca: "",
                modelo: "",
                placa: "",
                observacao: "",
            },
            consulta: false,
        };
    },
    watch: {
        "inputs.placa": function (val) {
            this.inputs.placa = val.toUpperCase();
            this.validarPlaca();
        },
        "inputs.chassi": function () {
            this.validarChassi();
        },
        "inputs.marca": function () {
            this.validarMarca();
        },
        "inputs.modelo": function () {
            this.validarModelo();
        },
    },
    methods: {
        validation: function () {
            const validation_result = [
                this.validarPlaca(),
                this.validarChassi(),
                this.validarMarca(),
                this.validarModelo(),
                this.validarObservacao(),
            ];
            if (validation_result.findIndex((i) => i == true) == -1) {
                this.$inertia.put(
                    this.$route("veiculos.update", this.vehicle.placa),
                    this.inputs
                );
            }
        },
        validarPlaca: function () {
            this.errors.placa = "";
            if (
                !isNaN(parseInt(this.inputs.placa.slice(0, 3))) ||
                isNaN(parseInt(this.inputs.placa.slice(3, 8))) ||
                this.inputs.placa.length != 7
            ) {
                this.errors.placa = "Esta é uma placa inválida";
                return true;
            }
            window.axios
                .get(
                    `https://apicarros.com/v1/consulta/${this.inputs.placa}/json`
                )
                .then((result) => {
                    const info = result.data;
                    this.consulta = info;
                    if (this.inputs.modelo == "") {
                        this.inputs.modelo = info.modelo;
                    }
                    if (this.inputs.marca == "") {
                        this.inputs.marca = info.marca;
                    }
                });
            return false;
        },
        validarChassi: function () {
            this.errors.chassi = "";
            if (this.inputs.chassi.length != 17) {
                this.errors.chassi = "Esse não é um chassi inválido";
                return true;
            }
            return false;
        },
        validarMarca: function () {
            this.errors.marca = "";
            if (this.inputs.marca.length < 4) {
                this.errors.marca = "Esse marca não é inválida";
                return true;
            }
            return false;
        },
        validarModelo: function () {
            this.errors.modelo = "";
            if (this.inputs.modelo.length < 4) {
                this.errors.modelo = "Esse modelo não é inválido";
                return true;
            }
            return false;
        },
        validarObservacao: function () {
            if (this.action == "put" && this.oldStatus != this.inputs.status) {
                this.errors.observacao = "";
                if (this.inputs.observacao.length < 7) {
                    this.errors.observacao = "Essa observação é inválida";
                    return true;
                }
                return false;
            }
            return false;
        },
    },
};
</script>
