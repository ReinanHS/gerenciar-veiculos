<template>
    <form>
        <slot></slot>
        <div class="form-group">
            <label for="placa-input">Placa</label>
            <input type="text" class="form-control" id="placa-input" aria-describedby="placaHelp">
            <small id="placaHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="modelo-input">Modelo</label>
            <input type="text" class="form-control" id="modelo-input" aria-describedby="modeloHelp">
            <small id="modeloHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="marca-input">Marca</label>
            <input type="text" class="form-control" id="marca-input" aria-describedby="marcaHelp">
            <small id="marcaHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="status-select">Status</label>
            <select class="form-control" id="status-select">
                <option>Disponível</option>
                <option>Quebrado</option>
                <option>Manutenção</option>
            </select>
        </div>
        <div class="form-group">
            <label for="chassi-input">Chassi</label>
            <input type="text" class="form-control" id="chassi-input" aria-describedby="chassiHelp">
            <small id="chassiHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</template>
<script>
export default {
    name: 'CreateVehiche',
}
</script>
