import React from 'react';
import './App.css';

class App extends React.Component {
  constructor(props) {
    super(props);
    this.fileInput = React.createRef();
    this.handlerSubmit = this.handlerSubmit.bind(this);
    this.handlerFio = this.handlerFio.bind(this);
    this.handlerEmail = this.handlerEmail.bind(this);
    this.handlerComment = this.handlerComment.bind(this);
    this.handlerAddress = this.handlerAddress.bind(this);
    this.handlerPhone = this.handlerPhone.bind(this);
    this.state = {fio: '',
                  email: '',
                  comment: "",
                  address: '',
                  phone: '',
                  bg_color_fio: "bg-white",
                  bg_color_email: "bg-white",
                  error: ''
                }
  }
  handlerSubmit(event) {
    let noFioOrEmail = false;
    let errors = "";
    if (!this.state.email || /^\s*$/.test(this.state.email)) {
      noFioOrEmail = true;
      this.setState({bg_color_email: " bg-danger text-white"});
      errors+=" Ошибка - Не заполнен E-mail";
      //this.setState({error: errors+" Ошибка - Не заполнен E-mail"});
    } else {
      this.setState({bg_color_email: "bg-white text-black"});
    }
    if (!this.state.fio || /^\s*$/.test(this.state.fio)) {
      noFioOrEmail = true;
      this.setState({bg_color_fio: " bg-danger text-white"});
      errors+=" Ошибка - Не заполнено ФИО";
     // this.setState({error: errors+" Ошибка - Не заполнено ФИО"});
    } else {
      this.setState({bg_color_fio: "bg-white text-black"});
    }
    if (!noFioOrEmail) {
      console.log("Ошибок нет");
      this.setState({error: ""})


     /* var xhr = new XMLHttpRequest();
      xhr.open('POST', 'public/index.php', true);
      xhr.onload = function() {
        if (xhr.status === 200) {
          // File(s) uploaded.
          alert('Отправка');
        } else {
          alert('An error occurred!');
        }
      };
      console.log(JSON.stringify(this.state));
      xhr.send(JSON.stringify(this.state));
      if (xhr.status != 200) {
        // обработать ошибку
        alert(xhr.status + ': ' + xhr.statusText); // пример вывода: 404: Not Found
      } else {
        alert(xhr.responseText); // responseText -- текст ответа.
      }*/
      


      fetch("index.php", { method: 'POST', 
      headers: {
        'Content-Type': 'application/json', 
      },
      body: JSON.stringify(this.state)})
        .then((response)=>{return response.json()})
        .then((data)=>{console.log('Submited: ', data)})
        .catch(error => console.error(error));
    } else {
      this.setState({error: errors});
    }
  }
  handlerFio(event){
    this.setState({fio: event.target.value})
  }
  handlerEmail(event){
    this.setState({email: event.target.value})
  }
  handlerAddress(event){
    this.setState({address: event.target.value})
  }
  handlerPhone(event){
    this.setState({phone: event.target.value})
  }
  handlerComment(event){
    this.setState({comment: event.target.value})
  }
  render() {
    return <div className="container">
      <form onSubmit={this.handlerSubmit}>

      <div className="row  m-3">
          <div className="col-12">
            <h1>Форма обратной связи</h1>
          </div>
        </div>

        <div className="row  m-3">
          <div className="form-group col-6">
            <input className="form-control" className={this.state.bg_color_fio} maxLength="30" type="text" name="fio" value={this.state.fio} onChange={this.handlerFio} placeholder="ФИО"/>
          </div>
          <div className="form-group col-6">
            <input className="form-control" className={this.state.bg_color_email} maxLength="30" type="text" name="email" value={this.state.email} onChange={this.handlerEmail} placeholder="E-mail"/>
          </div>
        </div>

        <div className="row m-3">
          <div className="form-group col-12">
            <input className="form-control" maxLength="30" type="text" name="address" value={this.state.address} onChange={this.handlerAddress} placeholder="Адрес"/>
          </div>
        </div>

        <div className="row  m-3">
          <div className="form-group col-12">
          <textarea className="form-control" maxLength="30" name="comment" cols="40" rows="10" value={this.state.comment} onChange={this.handlerComment} placeholder="Коментарии"/>
          </div>
        </div>

        <div className="row m-3">
          <div className="form-group col-6">
            <input className="form-control" maxLength="30" type="text" name="phone" value={this.state.phone} onChange={this.handlerPhone} placeholder="Номер телефона"/>
          </div>
        </div>
        <div className="row m-3">
          <div className="control-group required col-6">
                <label className="control-label" htmlFor="id_file">Загрузить файл: </label>
                <div className="controls">     
                  <input className="form-control" id="id_file" maxLength="30" type="file" ref={this.fileInput} /> 
                </div>
          </div>
        </div>

        <div className="row m-3">
          <div className="form-group col-12">
            <input className="btn btn-default" type="button" onClick={this.handlerSubmit} value="Отправить" className="button"/>
          </div>
        </div>

        <div className="row  m-3">
          <div className="form-group col-12">
              <label className="control-label" htmlFor="id_error">Панель задач: </label>
              <input className="form-control" maxLength="30" type="text" name="error" value={this.state.error} id="id_error"/>
          </div>
        </div>

      </form>
    </div>
  }
}

export default App;
