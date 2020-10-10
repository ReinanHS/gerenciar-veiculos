<template>
    <div>
        <modal-delete ref="modal" :route="route"></modal-delete>
        <table class="table">
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
                <tr v-for="(veiculo, index) in veiculos.data" :key="index">
                    <th scope="row">{{ veiculo.placa }}</th>
                    <td>{{ veiculo.modelo }}</td>
                    <td>{{ veiculo.marca }}</td>
                    <td>{{ veiculo.status }}</td>
                    <td>{{ veiculo.chassi }}</td>
                    <td class="d-flex">
                        <a :href="route + '/' + veiculo.placa + '/edit'" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn btn-secondary" v-on:click.prevent.stop="modalDelete(veiculo)">Deletar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name: 'ListVehiche',
    props: {
        veiculos: {
            type: Object,
            default: () => {
                return [];
            }
        },
        route: {
            type: String,
        }
    },
    methods: {
        modalDelete: function(veiculo){
            this.$refs.modal.showModal(veiculo);
        }
    },
}
</script>
