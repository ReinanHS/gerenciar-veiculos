export function removeAcentos(text){
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
};

export function formataCPF(cpf){
    //retira os caracteres indesejados...
    cpf = cpf.replace(/[^\d]/g, "");

    //realizar a formatação...
    return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
}
