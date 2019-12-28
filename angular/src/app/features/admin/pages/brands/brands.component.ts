import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { Brand } from 'src/app/shared/models/brand.model';
import { AdminBrandsService } from '../services/admin-brands.service';
import { DomSanitizer } from '@angular/platform-browser';

@Component({
  selector: 'app-brands',
  templateUrl: './brands.component.html',
  styleUrls: ['./brands.component.scss']
})
export class BrandsComponent implements OnInit {

  insertBrandForm: FormGroup;
  brands: Brand[];
  
  constructor(private brand: AdminBrandsService,public dom: DomSanitizer) {
      this.insertBrandForm = new FormGroup({
      brand_name: new FormControl("", [
        Validators.required,
        Validators.maxLength(20),
        Validators.minLength(3)
      ]),
      brand_image: new FormControl("")
    });
  }

  ngOnInit() {
    this.brand.getBrands().subscribe((response: Brand[]) => {
      console.log(response);
      this.brands = response;
    });
  
   
  }

  deleteBrand(data: number) {
    this.brand.deleteBrand(data).subscribe((response: number) => {
      console.log(response),
        this.brand.getBrands().subscribe((response: Brand[]) => {
          console.log(response);
          this.brands = response;
        });
    });
  }

  
  get Brand() {
    return this.insertBrandForm.get("brand_name");
  }


  insertBrand() {
    const formData = new FormData();
    formData.append("brand_name", this.insertBrandForm.value.brand_name);
    formData.append("brand_image", this.insertBrandForm.value.brand_image);
    this.brand.insertBrand(formData).subscribe((response: Object) => {
      console.log(response);
      this.brand.getBrands().subscribe((response: Brand[]) => {
        this.brands = response;
        this.insertBrandForm.reset();
      });
    });
  }

  onFileSelect(event) {
    if (event.target.files.length > 0) {
      const file = event.target.files[0];

      this.insertBrandForm.get("brand_image").setValue(file,{emitModelToViewChange: true});
    }
  }

}
