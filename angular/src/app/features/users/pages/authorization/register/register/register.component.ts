import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { LogRegService } from 'src/app/shared/services/log-reg.service';
import { TokenService } from 'src/app/shared/services/token.service';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/shared/services/auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss']
})
export class RegisterComponent implements OnInit {

  form: FormGroup;

  public errors='';
  constructor(
    private logreg: LogRegService,
    private Token: TokenService,
    private router: Router,
    private auth: AuthService
  ) {
    this.form = new FormGroup(
      {
        first_name: new FormControl("", [
          Validators.required,
          Validators.maxLength(20),
          Validators.minLength(3)
        ]),

        last_name: new FormControl("", [
          Validators.required,
          Validators.maxLength(22),
          Validators.minLength(4)
        ]),
         email: new FormControl("", [
          Validators.required,
          Validators.maxLength(40),
          Validators.minLength(5),
          Validators.email
        ]),
       
        password: new FormControl("", [
          Validators.required,
          Validators.maxLength(20),
          Validators.minLength(3)
        ]),

        address: new FormControl("", [
          Validators.required,
          Validators.maxLength(20),
          Validators.minLength(6)
        ])
       
      },
    );
  }
  get first_name() {
    return this.form.get("first_name");
  }

  get last_name() {
    return this.form.get("last_name");
  }

  get email() {
    return this.form.get("email");
  }
  get address() {
    return this.form.get("address");
  }
  get password() {
    return this.form.get("password");
  }
  

  onSubmit() {
    this.logreg
      .signup({
        first_name: this.form.value.first_name,
        last_name: this.form.value.last_name,
        email: this.form.value.email,
        password: this.form.value.password,
        address: this.form.value.address
      })
      .subscribe(
        data => {
          this.handleResponse(data);
        },
        error => {
          console.log(error);
          this.errors='User with this email already exists! Please type the other email address and try again!';
        }
      );
  }

  handleResponse(data) {
    this.router.navigateByUrl("/auth/login");
  }

  ngOnInit() {
  }

}
