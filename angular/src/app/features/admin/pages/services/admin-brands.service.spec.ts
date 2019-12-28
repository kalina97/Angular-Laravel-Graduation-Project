import { TestBed } from '@angular/core/testing';

import { AdminBrandsService } from './admin-brands.service';

describe('AdminBrandsService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: AdminBrandsService = TestBed.get(AdminBrandsService);
    expect(service).toBeTruthy();
  });
});
