<template>
    <div>
        <form method="POST" :action="route" ref="form">
            <slot></slot>
            <div class="form-group">
                <label for="placa-input">Placa</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{
                        'is-invalid': error.placa.length > 0,
                        'is-valid':
                            inputs.placa.length == 7 && error.placa.length == 0,
                    }"
                    v-model="inputs.placa"
                    name="placa"
                    required
                    autofocus
                    id="placa-input"
                    aria-describedby="placaHelp"
                />
                <span
                    class="invalid-feedback"
                    role="alert"
                    v-if="error.placa.length > 0"
                >
                    <strong
                        v-for="(item, index) in error.placa"
                        :key="index"
                        class="d-block"
                        >{{ item }}
                    </strong>
                </span>

                <slot name="placa"></slot>

                <ul class="list-group mt-4" v-if="consulta">
                    <li class="list-group-item">
                        <b>Cor</b>: {{ consulta.cor }}
                    </li>
                    <li class="list-group-item">
                        <b>Situação</b>: {{ consulta.situacao }}
                    </li>
                    <li class="list-group-item">
                        <b>Municipio</b>: {{ consulta.municipio }}
                    </li>
                    <li class="list-group-item">
                        <b>Chassi</b>: {{ consulta.chassi }}
                    </li>
                    <li class="list-group-item">
                        <b>UF</b>: {{ consulta.uf }}
                    </li>
                </ul>
            </div>
            <div class="form-group">
                <label for="modelo-input">Modelo</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{
                        'is-invalid': error.modelo.length > 0,
                        'is-valid':
                            inputs.modelo.length > 1 &&
                            error.modelo.length == 0,
                    }"
                    v-model="inputs.modelo"
                    name="modelo"
                    required
                    id="modelo-input"
                    aria-describedby="modeloHelp"
                />
                <span
                    class="invalid-feedback"
                    role="alert"
                    v-if="error.modelo.length > 0"
                >
                    <strong
                        v-for="(item, index) in error.modelo"
                        :key="index"
                        class="d-block"
                        >{{ item }}
                    </strong>
                </span>
            </div>
            <div class="form-group">
                <label for="marca-input">Marca</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{
                        'is-invalid': error.marca.length > 0,
                        'is-valid':
                            inputs.marca.length > 1 && error.marca.length == 0,
                    }"
                    v-model="inputs.marca"
                    name="marca"
                    required
                    id="marca-input"
                    aria-describedby="marcaHelp"
                />
                <span
                    class="invalid-feedback"
                    role="alert"
                    v-if="error.marca.length > 0"
                >
                    <strong
                        v-for="(item, index) in error.marca"
                        :key="index"
                        class="d-block"
                        >{{ item }}
                    </strong>
                </span>
            </div>
            <div class="form-group">
                <label for="status-select">Status</label>
                <select
                    class="form-control"
                    id="status-select"
                    name="status"
                    v-model="inputs.status"
                >
                    <option value="disponível">Disponível</option>
                    <option value="quebrado">Quebrado</option>
                    <option value="manutenção">Manutenção</option>
                </select>
            </div>
            <div class="form-group" v-if="oldStatus != '' && oldStatus != inputs.status">
                <label for="chassi-input">Observação do status</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{
                        'is-invalid': error.observacao.length > 0,
                        'is-valid':
                            inputs.observacao.length > 10 &&
                            error.observacao.length == 0,
                    }"
                    v-model="inputs.observacao"
                    name="observacao"
                    required
                    id="observacao-input"
                    aria-describedby="observacaoHelp"
                />
                <span
                    class="invalid-feedback"
                    role="alert"
                    v-if="error.observacao.length > 0"
                >
                    <strong
                        v-for="(item, index) in error.observacao"
                        :key="index"
                        class="d-block"
                        >{{ item }}
                    </strong>
                </span>
            </div>
            <div class="form-group">
                <label for="chassi-input">Chassi</label>
                <input
                    type="text"
                    class="form-control"
                    :class="{
                        'is-invalid': error.chassi.length > 0,
                        'is-valid':
                            inputs.chassi.length == 17 &&
                            error.chassi.length == 0,
                    }"
                    v-model="inputs.chassi"
                    name="chassi"
                    required
                    id="chassi-input"
                    aria-describedby="chassiHelp"
                />
                <span
                    class="invalid-feedback"
                    role="alert"
                    v-if="error.chassi.length > 0"
                >
                    <strong
                        v-for="(item, index) in error.chassi"
                        :key="index"
                        class="d-block"
                        >{{ item }}
                    </strong>
                </span>
            </div>
            <button v-on:click.prevent.stop="submit()" class="btn btn-primary">
                Enviar
            </button>
            <a :href="routeIndex" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</template>

<script>
export default {
    name: "FormVehiche",
    props: {
        route: {
            type: String,
        },
        vehicle: {
            type: Object,
            default() {
                return {
                    chassi: "",
                    status: "disponível",
                    marca: "",
                    modelo: "",
                    placa: "",
                };
            },
        },
        routeIndex: {
            type: String,
        },
        action: {
            type: String,
        },
    },
    mounted() {
        this.inputs = {
            ...this.inputs,
            ...this.vehicle
        };

        if(this.action == 'put'){
            this.oldStatus = this.vehicle.status
        }
    },
    data() {
        return {
            oldStatus: '',
            inputs: {
                chassi: "",
                status: "disponível",
                marca: "",
                modelo: "",
                placa: "",
                observacao: "",
            },
            error: {
                chassi: [],
                status: [],
                marca: [],
                modelo: [],
                placa: [],
                observacao: [],
            },
            consulta: false,
        };
    },
    watch: {
        "inputs.placa": function () {
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
        submit: function () {
            this.validation();
        },
        validation: function () {
            const validation_result = [
                this.validarPlaca(),
                this.validarChassi(),
                this.validarMarca(),
                this.validarModelo(),
                this.validarObservacao(),
            ];

            if (validation_result.findIndex((i) => i == true) == -1) {
                if (this.action == "post") {
                    this.$awn.asyncBlock(
                        axios
                            .post(this.route, this.inputs)
                            .then((response) => {
                                window.location.href = this.$props.routeIndex;
                            })
                            .catch((error) => {
                                if (error.response != undefined) {
                                    this.error = {
                                        ...this.error,
                                        ...error.response.data.errors,
                                    };
                                    return this.$awn.alert("Erro na validação");
                                }
                            }),
                        false
                    );
                }else if (this.action == "put") {
                    this.$awn.asyncBlock(
                        axios
                            .put(this.route, this.inputs)
                            .then((response) => {
                                window.location.href = this.$props.routeIndex;
                            })
                            .catch((error) => {
                                if (error.response != undefined) {
                                    this.error = {
                                        ...this.error,
                                        ...error.response.data.errors,
                                    };
                                    return this.$awn.alert("Erro na validação");
                                }
                            }),
                        false
                    );
                }
            }
        },
        validarPlaca: function () {
            this.error.placa = [];

            if (
                !isNaN(parseInt(this.inputs.placa.slice(0, 3))) ||
                isNaN(parseInt(this.inputs.placa.slice(3, 8))) ||
                this.inputs.placa.length != 7
            ) {
                this.error.placa.push("Esta é uma placa inválida");
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
            this.error.chassi = [];

            if (this.inputs.chassi.length != 17) {
                this.error.chassi.push("Esse não é um chassi inválido");
                return true;
            }

            return false;
        },
        validarMarca: function () {
            this.error.marca = [];

            if (this.inputs.marca.length < 4) {
                this.error.marca.push("Esse marca não é inválida");
                return true;
            }

            return false;
        },
        validarModelo: function () {
            this.error.modelo = [];

            if (this.inputs.modelo.length < 4) {
                this.error.modelo.push("Esse modelo não é inválido");
                return true;
            }

            return false;
        },
        validarObservacao: function(){
            if(this.action == 'put' && this.oldStatus != this.inputs.status){
                this.error.observacao = [];

                if (this.inputs.observacao.length < 7) {
                    this.error.observacao.push("Essa observação é inválida");
                    return true;
                }

                return false;
            }

            return false;
        }
    },
};
</script>

<style>
</style>
