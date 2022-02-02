/**
 * 
 * Botão para liberar TRIAL 
 * 
*/
$("#trialAjx").click(function (event) {

  var post_url = $(this).attr("url");
  var id = $(this).attr("select");
  var _method = 'put';

  //Salvar
  $.ajax({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    url: post_url,
    type: 'post',
    data: { id, _method },
    beforeSend: function () {
      //Spiner
      $('#spiner-' + id).removeClass('d-none');
    },
    success: function (response) {

      if(response.success){
        Swal.fire('Sucesso!', response.message, 'success');
        //Remove o botão
        $('#trialAjx').remove();
        //Muda nome 
        $('#spanTrial').html('Ainda Não');
      }
      else
      {
        Swal.fire({ icon: 'warning', title: 'Oops...', text: response.message });
      }

      //Retira o spiner
      $('#spiner-type').addClass('d-none');

      return;
      
    }
  }).fail(function (jqXHR, textStatus, message) {
      toastr.error('Ocorreu um erro na hora da atualização, atualize a página e tente novamente!', 'Erro!', {
      closeButton: true,
      progressBar: true,
    });

  });

});


/**
* 
* ##########################################
*     Adicionar pagamento
*  ##########################################
*
*/

$("#addPagamento").submit(function (event) {

var post_url = $(this).attr("action");

//Pega inputs
var form_data = $(this).serialize();

//Salvar
$.ajax({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
  url: post_url,
  type: 'post',
  data: form_data,
  beforeSend: function () {
    //Spiner
    $('#spiner-add').removeClass('d-none');
  },
  success: function (response) {

    // Se precisar mesmo recarregar a página
    document.location.reload(true);

    // Executa popap de sucesso!
    toastr.success('Atualizado com sucesso!', 'Sucesso!', {
      closeButton: true,
      progressBar: true,
    });

    //Retira o spiner
    $('#spiner-add').addClass('d-none');

    return;
  }
}).fail(function (jqXHR, textStatus, message) {
    toastr.error('Ocorreu um erro na hora da atualização, atualize a página e tente novamente!', 'Erro!', {
    closeButton: true,
    progressBar: true,
  });

});

});