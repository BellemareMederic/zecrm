$('document').ready(function () {

  /*Chargement des tout les notes*/
  $(".modal a").click(function () {
    addNote($('.modal #title').val(), $('.modal #desc').val());
  });


  notecontainer = $(".flex-carte");
  $.ajax({
    url: 'https://jsonplaceholder.typicode.com/posts',
    type: 'GET',
    data: 'userId=' + notecontainer.data('user'),
    dataType: 'json',
    success: function (donnees, statut, jqXHR) {
      toHTMLNote(donnees);
    },
    error: function (jqXHR, statut, erreur) {
      console.warn(erreur, statut, jqXHR);
    }
  });//ajax

  /*
  * Function addNote qui rajouter une note aux serveur et sur le DOM
  *
  * Return Noting
  * */
  function addNote(title, note) {
    $.ajax({
      url: 'https://jsonplaceholder.typicode.com/posts',
      type: 'POST',
      data: {
        title: title,
        body: note
      },
      dataType: 'json',
      success: function (donnees, statut, jqXHR) {
        console.log(donnees);
        toHTMLNote([donnees]);
      },
      error: function (jqXHR, statut, erreur) {
        console.warn(erreur, statut, jqXHR);
      }
    });//ajax
  }

  function toHTMLNote(data) {
    for (var i = 0; i < data.length; i++) {
      notecontainer.append('<div class="carte" data-id="' + data[i].id + '"><div class="card-body"><h4 class="card-title">' + data[i].title + '</h4><p class="card-text">' + data[i].body + '</p><span class="edit"><i class="ion-edit"></i>Editer</span><span class="delete"><i class="ion-trash-b"></i>Supprimer</span></div></div>');

    }
    $('.edit').click(function () {
      doEditNote($(event.target).parent().parent())
    });
    $('.delete').click(function () {
      doDeleteNote($(event.target).parent().parent())
    });
  }

  function doDeleteNote(carte) {
    $.ajax({
      url: 'https://jsonplaceholder.typicode.com/posts/' + carte.data('id'),
      type: 'DELETE',
      success: function (donnees, statut, jqXHR) {
        carte.fadeOut();
      },
      error: function (jqXHR, statut, erreur) {
        carte.fadeIn();
        carte.css('transition', 'all 1s').css('border', '5px solid red');
        console.warn(erreur, statut, jqXHR);
      }
    });//ajax
  }

  function doEditNote(carte) {
    if (carte.children().find('h4').html().search('input') >= 0) {
      currenth = carte.children().find('input').val();
      currentp = carte.children().find('textarea').val();
      $.ajax({
        url: 'https://jsonplaceholder.typicode.com/posts/' + carte.data('id'),
        type: 'PATCH',
        data: {
          title: currenth,
          body: currentp
        },
        success: function (donnees, statut, jqXHR) {
          carte.children().find('h4').html('<h4>' + currenth + '</h4>');
          carte.children().find('p').html('<p>' + currentp + '</p>');
        },
        error: function (jqXHR, statut, erreur) {
          carte.fadeIn();
          carte.css('transition', 'all 1s').css('border', '5px solid red');
          console.warn(erreur, statut, jqXHR);
        }
      });//ajax
    } else {
      currenth = carte.children().find('h4').text();
      currentp = carte.children().find('p').text();
      carte.children().find('h4').html('<input value="' + currenth + '" data-type="header" ></input>');
      carte.children().find('p').html('<textarea data-type="body" rows="15" cols="35">' + currentp + '</textarea>');
    }

  }

});