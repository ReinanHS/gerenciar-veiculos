<template>
    <div>
        <modal-delete ref="modal" :route="route"></modal-delete>
        <form class="form-inline mt-2 mt-md-0 mb-4">
            <input
                v-model="filter"
                class="form-control mr-sm-2"
                type="text"
                placeholder="Filtro"
                aria-label="Search"
                style="width: 100%;"
            />
        </form>
        <table class="table table-bordered dataTable" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">Placa</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Status</th>
                    <th scope="col">Chassi</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(veiculo, index) in filtered" :key="index">
                    <th scope="row">{{ veiculo.placa }}</th>
                    <td>{{ veiculo.modelo }}</td>
                    <td>{{ veiculo.marca }}</td>
                    <td>{{ veiculo.status }}</td>
                    <td>{{ veiculo.chassi }}</td>
                    <td class="d-flex">
                        <a
                            :href="route + '/' + veiculo.placa + '/edit'"
                            class="btn btn-primary"
                            >Editar</a
                        >
                        <button
                            type="button"
                            class="btn btn-secondary"
                            v-on:click.prevent.stop="modalDelete(veiculo)"
                        >
                            Deletar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name: "ListVehiche",
    props: {
        veiculos: {
            type: Object,
            default: () => {
                return [];
            },
        },
        route: {
            type: String,
        },
    },
    data() {
        return {
            filter: "",
        };
    },
    computed: {
        filtered() {
            return this.veiculos.data.filter((veiculo) => {
                const placa = this.removeAcentos(veiculo.placa.toLowerCase());
                const modelo = this.removeAcentos(veiculo.modelo.toLowerCase());
                const marca = this.removeAcentos(veiculo.marca.toLowerCase());
                const status = this.removeAcentos(veiculo.status.toLowerCase());
                const chassi = this.removeAcentos(veiculo.chassi.toLowerCase());
                const searchTerm = this.removeAcentos(this.filter.toLowerCase());

                return (
                    placa.includes(searchTerm) ||
                    modelo.includes(searchTerm) ||
                    marca.includes(searchTerm) ||
                    chassi.includes(searchTerm) ||
                    status.includes(searchTerm)
                );
            });
        },
    },
    methods: {
        modalDelete: function (veiculo) {
            this.$refs.modal.showModal(veiculo);
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
