import { Component, OnInit } from '@angular/core';
import { Product } from 'src/app/shared/models/product.model';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { AdminProductsService } from '../services/admin-products.service';
import { DomSanitizer } from '@angular/platform-browser';
import { AdminCategoriesService } from '../services/admin-categories.service';
import { AdminBrandsService } from '../services/admin-brands.service';
import { Category } from 'src/app/shared/models/category.model';
import { Brand } from 'src/app/shared/models/brand.model';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.scss']
})
export class ProductsComponent implements OnInit {

  products: Product[];
  oneProduct: Product;
  form: FormGroup;
  updateForm: FormGroup;

  categories: Category[];
  brands: Brand[];

  pageOfItems: Array<any>;
  show: number = 5;
  productsPagionation: Product[];

  constructor(private product: AdminProductsService, private category:AdminCategoriesService, private brand:AdminBrandsService, public dom: DomSanitizer) {
    this.form = new FormGroup({

      name: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(3)
      ]),
      description: new FormControl("", [
        Validators.required,
        Validators.maxLength(200),
        Validators.minLength(3)
      ]),
      price: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(3)
      ]),
     
      brand_id: new FormControl("", [
        Validators.required
      ]),

      category_id: new FormControl("", [
        Validators.required
      ]),

      product_image: new FormControl("")
    });

    this.updateForm = new FormGroup({
      name: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(3)
      ]),
      description: new FormControl("", [
        Validators.required,
        Validators.maxLength(200),
        Validators.minLength(3)
      ]),
      price: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(3)
      ]),
     
      brand_id: new FormControl("", [
        Validators.required
      ]),

      category_id: new FormControl("", [
        Validators.required
      ]),

      product_image: new FormControl("")
     
    });
  }

  ngOnInit() {
    this.product.getAllProducts().subscribe((response: Product[]) => {
      this.products = response;
    });
    this.category.getCategories().subscribe((response: Category[])=>{
      this.categories=response;
  });

  this.brand.getBrands().subscribe((response: Brand[])=>{
    this.brands=response;
});
  }

  onChangePage(pageOfItems: Array<any>) {
    this.pageOfItems = pageOfItems;
  }

  onChange(event) {
    console.log(event);
    this.show = +event;
  }

  deleteProduct(id: number) {
    this.product.deleteProduct(id).subscribe((response: number) => {
      console.log(response);
      this.product.getAllProducts().subscribe((response: Product[]) => {
        this.products = response;
      });
    });
  }

  getOne(id: number) {
    this.product.getOneProduct(id).subscribe((response: Product) => {
      console.log(response);
      this.oneProduct = response;
      this.updateForm.patchValue({ name: response.name });
      this.updateForm.patchValue({ description: response.description });
      this.updateForm.patchValue({ price: response.price });
      this.updateForm.patchValue({ brand_id: response.brand_id });
      this.updateForm.patchValue({ category_id: response.category_id });
      

    });

    this.category.getCategories().subscribe((response: Category[])=>{
        this.categories=response;
    });

    this.brand.getBrands().subscribe((response: Brand[])=>{
      this.brands=response;
  });


  }

  insert() {
    const formData = new FormData();
    formData.append("name", this.form.value.name);
    formData.append("price", this.form.value.price);
    formData.append("description", this.form.value.description);
    formData.append("brand_id", this.form.value.brand_id);
    formData.append("category_id", this.form.value.category_id);
    formData.append("product_image", this.form.value.product_image);

    this.product.insertProduct(formData).subscribe((response: Object) => {
      console.log(response);
      this.product.getAllProducts().subscribe((response: Product[]) => {
        this.products = response;
      });
      this.form.reset();
    });

    this.category.getCategories().subscribe((response: Category[])=>{
      this.categories=response;
  });

  this.brand.getBrands().subscribe((response: Brand[])=>{
    this.brands=response;
});

  }

  onFileSelect(event) {
    if (event.target.files.length > 0) {
      const file = event.target.files[0];

      this.form.get("product_image").setValue(file);
    }
  }

  fileChange(event) {
    if (event.target.files.length > 0) {
      const file = event.target.files[0];

      this.updateForm.get("product_image").setValue(file);
    }
  }


  get updateName() {
    return this.updateForm.get("name");
  }
  get addName() {
    return this.form.get("name");
  }

  get updateDesc() {
    return this.updateForm.get("description");
  }
  get addDesc() {
    return this.form.get("description");
  }


  get updatePrice() {
    return this.updateForm.get("price");
  }
  get addPrice() {
    return this.form.get("price");
  }

  get updateBrand() {
    return this.updateForm.get("brand_id");
  }

  get addBrand() {
    return this.form.get("brand_id");
  }

  get updateCategory() {
    return this.updateForm.get("category_id");
  }

  get addCategory() {
    return this.form.get("category_id");
  }


  update(id: number) {
    const formData = new FormData();
    formData.append("name", this.updateForm.value.name);
    formData.append("price", this.updateForm.value.price);
    formData.append("description", this.updateForm.value.description);
    formData.append("brand_id", this.updateForm.value.brand_id);
    formData.append("category_id", this.updateForm.value.category_id);
    formData.append("product_image", this.updateForm.value.product_image);

    console.log(formData.get("name"));
    console.log(formData.get("price"));
    console.log(formData.get("description"));
    console.log(formData.get("brand_id"));
    console.log(formData.get("category_id"));
    console.log(formData.get("product_image"));
  
    this.product.updateProduct(formData, id).subscribe((response: Object) => {
      console.log(response);
      this.product.getAllProducts().subscribe((response: Product[]) => {
        this.products = response;
      });
      this.updateForm.reset();
      this.ngOnInit();
    });


    this.category.getCategories().subscribe((response: Category[])=>{
      this.categories=response;
  });

  this.brand.getBrands().subscribe((response: Brand[])=>{
    this.brands=response;
});

  }

}
