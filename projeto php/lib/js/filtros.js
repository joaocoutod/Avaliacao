function filtro_nome() {

    // declaração de variaveis
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("busca");
    filter = input.value.toUpperCase();
    table = document.getElementById("produtos");
    tr = table.getElementsByTagName("tr");
  
    // Percorra todas as linhas da tabela e oculta aquelas que não correspondem à consulta de pesquisa
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
