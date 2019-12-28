import { Component, OnInit } from '@angular/core';
import { Category } from 'src/app/shared/models/category.model';
import { AdminCategoriesService } from '../services/admin-categories.service';
import { FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-categories',
  templateUrl: './categories.component.html',
  styleUrls: ['./categories.component.scss']
})
export class CategoriesComponent implements OnInit {

  insertCategoryForm: FormGroup;
  categories: Category[];
  
  constructor(private category: AdminCategoriesService) {
      this.insertCategoryForm = new FormGroup({
      category_name: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(3)
      ])
    });
  }

  ngOnInit() {
    this.category.getCategories().subscribe((response: Category[]) => {
      console.log(response);
      this.categories = response;
    });
  
   
  }

  deleteCategory(data: number) {
    this.category.deleteCategory(data).subscribe((response: number) => {
      console.log(response),
        this.category.getCategories().subscribe((response: Category[]) => {
          console.log(response);
          this.categories = response;
        });
    });
  }

  
  get Category() {
    return this.insertCategoryForm.get("category_name");
  }


  insertCategory() {
    this.category
      .insertCategory(
        this.insertCategoryForm.value.category_name
      )
      .subscribe((response: number) => {
        console.log(response, "Category added"),
          this.category.getCategories().subscribe((response: Category[]) => {
            console.log(response);
            this.categories = response;
            this.insertCategoryForm.reset();
          });
      });
  }

}
