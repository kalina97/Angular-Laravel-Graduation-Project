import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AsicsProductsComponent } from './asics-products.component';

describe('AsicsProductsComponent', () => {
  let component: AsicsProductsComponent;
  let fixture: ComponentFixture<AsicsProductsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AsicsProductsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AsicsProductsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
