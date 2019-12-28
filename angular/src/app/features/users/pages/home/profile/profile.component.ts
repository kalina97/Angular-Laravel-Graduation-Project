import { Component, OnInit } from '@angular/core';
import { User } from 'src/app/shared/models/user.model';
import { ProfileService } from 'src/app/shared/services/profile.service';
import { TokenService } from 'src/app/shared/services/token.service';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {

  items: User;
  checkouts;
  user_id;
  role_id;
  constructor(
    private profile: ProfileService,
    private token: TokenService,
    public dom: DomSanitizer
  ) {}

  ngOnInit() {
    this.user_id = this.token.getUser();
    this.profile.getUser(this.user_id).subscribe((response: User) => {
      console.log(response), (this.items = response);
    });

    if (this.isUser()) {
      this.profile.getUserCheckouts(this.user_id).subscribe(response => {
        console.log(response);
        this.checkouts = response;
      });
    }
  }

  isUser() {
    let role_id = +this.token.getRole();
    return role_id == 2 ? true : false;
  }

}
