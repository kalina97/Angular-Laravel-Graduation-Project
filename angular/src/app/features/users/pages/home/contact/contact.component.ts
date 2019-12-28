import { Component, OnInit } from '@angular/core';
import { Contact } from 'src/app/shared/models/contact.model';
import { Router } from '@angular/router';
import { ContactService } from 'src/app/shared/services/contact.service';
import { FormGroup, Validators, FormControl } from '@angular/forms';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  public form: Contact  = {
    name: '',
    email: '',
    subject: '',
    message: ''
  }


  items;
  alert='';
  constructor(
    private contact: ContactService,
    private router: Router
  ) {}

  ngOnInit() {
    /*this.contact.getInfos().subscribe(
      response =>{
        console.log(response),
        this.items = response;
      },
      error => {}
    )*/
  }

  onSubmit(){
    this.contact.insertContact(this.form).subscribe(
      (response: Contact) => {
        console.log(response);
        this.handleResponse();
        this.alert='Thank You For Cooperation!';
        this.form.name='';
        this.form.email='';
        this.form.subject='';
        this.form.message='';

      },
      error => {error}
    )
  }

  handleResponse(){
    this.router.navigateByUrl('/contact');
  }
}
