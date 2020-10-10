<template>
    <div class="modal" tabindex="-1" id="modalDelete">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmação para deletar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" v-if="veiculo">
                <p>Você está prestes a excluir o veículo de placa {{ veiculo.placa }}</p>
                <form ref="form" :action="route + '/' + veiculo.placa" method="post">
                    <input type="hidden" name="_method" value="delete" />
                    <input type="hidden" name="_token" :value="token">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button v-on:click="onDelete()" type="button" class="btn btn-primary">Deletar</button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModalDelete',
    props: {
        route: {
            type: String,
        }
    },
    mounted(){
        this.token = document.querySelector('meta[name="csrf-token"]').content;
    },
    data(){
        return {
            veiculo: false,
            token: '',
        };
    },
    methods: {
        showModal: function(veiculo) {
            this.veiculo = veiculo;
            $('#modalDelete').modal('show');
        },
        onDelete: function(){
            $('#modalDelete').modal('hide');
            this.$refs.form.submit();
        }
    }
}
</script>

<style>

</style>
