<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
      integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
      crossorigin="anonymous">
    <title>React-task-2</title>
    <script>			
    function check() {
        let fio = document.getElementById("fio").value; 
        console.log(fio);
        let form = document.getElementById("form")
        let email = document.getElementById("email").value; 
        let noFioOrEmail = false;
        let errors = "";
        if (!email || /^\s*$/.test(email)) {
            noFioOrEmail = true;
            document.getElementById("email").style.backgroundColor = 'red';
            errors+=" Ошибка - Не заполнен E-mail";
        } else {
            document.getElementById("email").style.backgroundColor = 'white';
        }
        if (!fio || /^\s*$/.test(fio)) {
            noFioOrEmail = true;
            document.getElementById("fio").style.backgroundColor = 'red';
            errors+=" Ошибка - Не заполнено ФИО";
        } else {
            document.getElementById("fio").style.backgroundColor = 'white';
        }
        if (!noFioOrEmail) {
        alert ("Ошибок нет");
            form.action = 'check.php';
            form.method = 'POST';
            form.submit();
        } else {
            alert (errors)
        }
    }

</script>
  </head>
  <body>
  <div class="container">
      <form   id="form">

      <div class="row  m-3">
          <div class="col-12">
            <h1>Форма обратной связи</h1>
          </div>
        </div>

        <div class="row  m-3">
          <div class="form-group col-6">
            <input class="form-control"  maxLength="30" type="text" name="fio"  placeholder="ФИО" id="fio"/>
          </div>
          <div class="form-group col-6">
            <input class="form-control"  maxLength="30" type="text" name="email"  placeholder="E-mail" id="email"/>
          </div>
        </div>

        <div class="row m-3">
          <div class="form-group col-12">
            <input class="form-control" maxLength="30" type="text" name="address"  placeholder="Адрес"/>
          </div>
        </div>

        <div class="row  m-3">
          <div class="form-group col-12">
            <textarea class="form-control" maxLength="30" name="comment" cols="40" rows="10"  placeholder="Коментарии"> </textarea>
          </div>
        </div>

        <div class="row m-3">
          <div class="form-group col-6">
            <input class="form-control" maxLength="30" type="text" name="phone" placeholder="Номер телефона"/>
          </div>
        </div>
        <div class="row m-3">
          <div class="control-group required col-6">
                <label class="control-label" for="id_file">Загрузить файл: </label>
                <div class="controls">     
                  <input class="form-control" name="file" id="id_file" maxLength="30" type="file" ref={this.fileInput} /> 
                </div>
          </div>
        </div>

        <div class="row m-3">
          <div class="form-group col-12">
          <input type="submit" onClick="check(); "><br>
          </div>
        </div>

      </form>
    </div>
   
	
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" 
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" 
    crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" 
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" 
    crossorigin="anonymous"></script>
  </body>
</html>