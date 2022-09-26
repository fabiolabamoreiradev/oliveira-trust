function VerValorDigit(num){
    var objRegExp = /[^0-9]+/g;
    var valor = num.value;
    valor = valor.replace(objRegExp,"");

    var re0 = /^[0-9\/]+$/;

    if (!re0.test(valor)){
      valor = valor.substring(0,valor.length-1);
    }

    var tamanho = valor.length;
    var milhar,centavos,aux,quociente;
    milhar='.';
    centavos=',';

      if (tamanho <= 5 && tamanho > 2){
        num.value = valor.substring(0,valor.length - 2) + centavos + valor.substring(valor.length -2,valor.length);
      } else if (tamanho >= 6){
        var quociente = (tamanho - 2) / 3;
        var aux = 5;
        while (quociente >= 1){
          if ( (valor.length - aux) != 0 ){
            valor = valor.substring(0,valor.length - aux) + milhar + valor.substring(valor.length - aux, valor.length);
          }
          aux += 4;
          quociente--;
        }
        num.value = valor.substring(0,valor.length - 2) + centavos + valor.substring(valor.length -2,valor.length);
      } else {
        num.value = valor;
      }
}