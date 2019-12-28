import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NikeProductsComponent } from './nike-products.component';

describe('NikeProductsComponent', () => {
  let component: NikeProductsComponent;
  let fixture: ComponentFixture<NikeProductsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NikeProductsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NikeProductsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
