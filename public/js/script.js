
function searchItems(needle,callback){
  var xhr = new XMLHttpRequest();
  
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      callback(JSON.parse(this.responseText));
    }
  };
  xhr.open('get','/item/search/'+needle,true);
  xhr.send();
}

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
    if (!this.value) { return false;}
      searchItems(this.value,result_arr=>{
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < result_arr.length; i++) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + result_arr[i].title.substr(0, val.length) + "</strong>";
            b.innerHTML = "<a href='/item/" + result_arr[i].id +"'>" + result_arr[i].title + "</a>";//.substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            // b.innerHTML += "<input type='hidden' value='" + result_arr[i].id + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            // b.addEventListener("click", function(e) {
            //     /*insert the value for the autocomplete text field:*/
            //     inp.value = this.getElementsByTagName("input")[0].value;
            //     /*close the list of autocompleted values,
            //     (or any other open lists of autocompleted values:*/
            //     closeAllLists();
            // });
            a.appendChild(b);
        }
      });
      

  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}


function count_down(elem_id,end_date){
  var end_time = new Date(end_date);
  setInterval(() => {
      var diff = end_time - new Date();
      var seconds = parseInt(diff/1000)%60;
      var minutes = parseInt(diff/60000)%60;
      var hours = parseInt(diff/3600000)%24;
      var days = parseInt(diff / (60 * 60 * 1000 * 24));
      
      document.getElementById(elem_id).innerText = days + ":" + hours +":" + minutes + ":" + seconds;
  }, 1000,0);
}

function addNewSpec(){
  console.log('sdfsdfsfd');
  $('[data-id="specs_row"]').each(function(idx,i){
    var next_index = i.children.length;
    var row = document.createElement('div');
    row.id = 'spec_row_' + Math.floor(Math.random() * 1000000);
    row.classList = "row";

    var col1 = document.createElement('div');
    
    var col2 = document.createElement('div');
    var col3 = document.createElement('div');
    row.appendChild(col1);
    row.appendChild(col2);
    row.appendChild(col3);

    col1.classList = "col";
    col2.classList = "col";
    col3.classList = "col";

    var random = Math.floor(Math.random() * 1000);

    var inp1 = document.createElement('input');
    inp1.name = 'spec_key_' + random;
    var inp2 = document.createElement('input');
    inp2.name = 'spec_value_' + random;
    var but = document.createElement('button');

    col1.appendChild(inp1);
    col2.appendChild(inp2);
    col3.appendChild(but);

    inp1.placeholder = "اسم الخيار";
    inp2.placeholder = "اسم الخيار";
    inp1.classList = "form-control";
    inp2.classList = "form-control";
    inp1.required = "required";
    inp2.required = "required";
    
    but.type="button";
    but.classList = "btn btn-danger";
  
    but.innerText= "حذف";
    but.addEventListener('click',function(){
      $('#'+row.id).remove();
    });

    i.appendChild(row);
  })
}

$(document).ready(function(){
  $('[data-id]').click(function(e){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var val = $(e.currentTarget).attr('data-id');
    $(e.currentTarget.parentNode)
        .find('input[data-id=' + val + ']')
        .first().attr('checked',true);
    var form = $(e.currentTarget).parents('form:first');
    var feedback = form.find('[name=feedback]')[0].value;
    var item_id = form.find('input[name="item_id"]')[0].value;
    var star_num = val.slice(6)
    $.post('/item/'+item_id+'/review',{
        _token:CSRF_TOKEN,
        item_id:item_id,
        feedback:feedback,
        star_num:star_num
    });
  });
})