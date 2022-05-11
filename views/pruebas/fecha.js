const contador_semanas = (inicio,fin) => {
    let contador = 0;
    let aux = 1;

    let minimo = new Date(
      parseInt(inicio.split("-")[0]),
      parseInt(inicio.split("-")[1]) - 1,
      parseInt(inicio.split("-")[2])
    );
      
    let maximo = new Date (
        parseInt(fin.split("-")[0]),
        parseInt(fin.split("-")[1]) - 1,
        parseInt(fin.split("-")[2])
    );

        console.log(inicio,fin);
        console.log(minimo.getTime(),maximo.getTime());

    while(maximo.getTime() >= minimo.getTime()) {
        minimo.setDate(minimo.getDate() + 1);
        if (aux == 7) {
            contador++;
            aux = 1;
        }
        aux++;
    };

    console.log(contador);
}

document.addEventListener('DOMContentLoaded', () => {
    contador_semanas('2022-02-15','2022-03-22')
})