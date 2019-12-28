import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { LogRegService } from 'src/app/shared/services/log-reg.service';
import { TokenService } from 'src/app/shared/services/token.service';
import { AuthService } from 'src/app/shared/services/auth.service';
import { Router } from '@angular/router';
import { ProductService } from '../../../products/services/product.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  form: FormGroup;

  public errors = '';

  constructor(
    private logreg: LogRegService,
    private Token: TokenService,
    private auth: AuthService,
    private router: Router,
    private productService: ProductService
  ) {
    this.form = new FormGroup({
      email: new FormControl("", [Validators.required]),
      password: new FormControl("", [Validators.required])
    });
  }

  get email() {
    return this.form.get("email");
  }
  get password() {
    return this.form.get("password");
  }

  onSubmit() {
    this.logreg
      .login({
        email: this.form.value.email,
        password: this.form.value.password
      })
      .subscribe(
        data => {
          this.handleResponse(data);
          this.handleUser(data["user"]);
          this.handleRole(data["role_id"]);
          console.log(data["user"], "user", "role_id");
          this.productService.toRefreshNavigation();
          console.log(this.Token.get());
          

         console.log(this.Token.isAdmin(), "isAdmin?");
        },
        error => {
          console.log(error);
          this.errors='Email or password does not exist! Please Sign Up and try again!';
          
          
          
        }
      );
  }

  handleResponse(data) {
    this.Token.handle(data.access_token);
    this.auth.changeAuthStatus(true);
    this.router.navigateByUrl("/profile");
  }

  handleRole(role_id) {
    this.Token.handleRole(role_id);
  }

  handleUser(user) {
    this.Token.handleUser(user);
  }

  ngOnInit() {
  }

}
