import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ReebokProductsComponent } from './reebok-products.component';

describe('ReebokProductsComponent', () => {
  let component: ReebokProductsComponent;
  let fixture: ComponentFixture<ReebokProductsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ReebokProductsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ReebokProductsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
