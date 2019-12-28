import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { User } from 'src/app/shared/models/user.model';
import { AdminUsersService } from '../services/admin-users.service';
import { encode } from 'punycode';


@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.scss']
})
export class UsersComponent implements OnInit {

  editUserForm: FormGroup;
  insertUserForm: FormGroup;
  users: User[];
  oneUser: User;

  constructor(private user: AdminUsersService) {
    //edit user form
    this.editUserForm = new FormGroup({
      first_name: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(3)
      ]),
      last_name: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(4)
      ]),
      email: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
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
      ]),
      role_id: new FormControl("", [Validators.required])
    });

       //insert user form
    this.insertUserForm = new FormGroup({
      first_name: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(3)
      ]),
      last_name: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(4)
      ]),
      email: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
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
      ]),
      role_id: new FormControl("", [Validators.required])

    });
  }

  ngOnInit() {
    this.user.getUsers().subscribe((response: User[]) => {
      console.log(response);
      this.users = response;
    });
  }

  deleteUser(data: number) {
    this.user.deleteUser(data).subscribe((response: number) => {
      console.log(response),
        this.user.getUsers().subscribe((response: User[]) => {
          console.log(response);
          this.users = response;
        });
    });
  }

  getOneUser(id: number) {
    this.user.getOneUser(id).subscribe((response: User) => {
      this.oneUser = response;
      this.editUserForm.patchValue({ first_name: response.first_name });
      this.editUserForm.patchValue({ last_name: response.last_name });
      this.editUserForm.patchValue({ email: response.email });
      this.editUserForm.patchValue({ password: response.password });
      this.editUserForm.patchValue({ address: response.address });
      this.editUserForm.patchValue({ role_id: response.role_id });
    });
  }


  get updateName() {
    return this.editUserForm.get("first_name");
  }
  get addName() {
    return this.insertUserForm.get("first_name");
  }

  get updateSurname() {
    return this.editUserForm.get("last_name");
  }
  get addSurname() {
    return this.insertUserForm.get("last_name");
  }


  get updateAddress() {
    return this.editUserForm.get("address");
  }
  get addAddress() {
    return this.insertUserForm.get("address");
  }

  get updatePass() {
    return this.editUserForm.get("password");
  }

  get addPass() {
    return this.insertUserForm.get("password");
  }

  get updateEmail() {
    return this.editUserForm.get("email");
  }

  get addEmail() {
    return this.insertUserForm.get("email");
  }


  get updateRole() {
    return this.editUserForm.get("role_id");
  }

  get addRole() {
    return this.insertUserForm.get("role_id");
  }

  update(id: number) {
    if (
      this.editUserForm.value.role_id !== undefined &&
      this.editUserForm.value.role_id !== null
    ) {
      this.user
        .updateUser(
          id,
          this.editUserForm.value.first_name,
          this.editUserForm.value.last_name,
          this.editUserForm.value.email,
          this.editUserForm.value.password,
          this.editUserForm.value.address,
          this.editUserForm.value.role_id
        )
        .subscribe((response: number) => {
          console.log("User updated 1", response);
          this.user
            .getUsers()
            .subscribe((response: User[]) => {
              this.users = response;
              this.ngOnInit();
              this.editUserForm.reset();
            });
        });
    } else {
      this.user
        .updateUser(
          id,
          this.editUserForm.value.first_name,
          this.editUserForm.value.last_name,
          this.editUserForm.value.email,
          this.editUserForm.value.password,
          this.editUserForm.value.address
        )
        .subscribe((response: number) => {
          console.log("User updated 2", response);
          this.user.getUsers().subscribe((response: User[]) => {
            console.log(response);
            this.users = response;
            this.ngOnInit();
            this.editUserForm.reset();
          });
        });
    }
  }

  insert() {
    this.user
      .insertUser(
        this.insertUserForm.value.first_name,
        this.insertUserForm.value.last_name,
        this.insertUserForm.value.email,
        this.insertUserForm.value.password,
        this.insertUserForm.value.address,
        this.insertUserForm.value.role_id
      )
      .subscribe((response: number) => {
        console.log(response, "user added"),
          this.user.getUsers().subscribe((response: User[]) => {
            console.log(response);
            this.users = response;
            this.ngOnInit();
            this.insertUserForm.reset();
          });
      },
      error =>{
        console.log(error);
        
      }
      
      );
  }

}
