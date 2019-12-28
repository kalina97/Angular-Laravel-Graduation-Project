import { Component, OnInit } from "@angular/core";
import { AuthService } from "../../services/auth.service";
import { Router } from "@angular/router";
import { TokenService } from "../../services/token.service";
import { ProductService } from 'src/app/features/users/pages/products/services/product.service';

@Component({
  selector: "app-navigation",
  templateUrl: "./navigation.component.html",
  styleUrls: ["./navigation.component.scss"]
})
export class NavigationComponent implements OnInit {
  public loggedIn: boolean;
  public isAdmin: boolean;
  user_id;
  role: number;
  userToken;
  constructor(
    private auth: AuthService,
    private router: Router,
    private token: TokenService,
    private productService: ProductService
  )
   {}
  
  ngOnInit() {
    this.auth.authStatus.subscribe(value => (this.loggedIn = value));
    this.user_id = this.token.getUser();
    this.role = +this.token.getRole();
    console.log(this.role);

     this.productService.refreshRole$.subscribe((response: boolean) => {
       console.log(response, "REFRESHED");
      this.role = +this.token.getRole();
      this.user_id = this.token.getUser();
      this.userToken=this.token.get();
    });
  }
  
  logout(event: MouseEvent) {
    event.preventDefault();
    this.token.remove();
    this.token.removeUser();
    this.token.removeRole();
    this.auth.changeAuthStatus(false);
    this.router.navigateByUrl("/auth/login");
  }
}
