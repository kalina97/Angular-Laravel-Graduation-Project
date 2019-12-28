import { TestBed } from '@angular/core/testing';

import { AdminCategoriesService } from './admin-categories.service';

describe('AdminCategoriesService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: AdminCategoriesService = TestBed.get(AdminCategoriesService);
    expect(service).toBeTruthy();
  });
});
