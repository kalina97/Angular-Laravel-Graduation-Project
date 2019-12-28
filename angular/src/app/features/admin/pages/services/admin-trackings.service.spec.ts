import { TestBed } from '@angular/core/testing';

import { AdminTrackingsService } from './admin-trackings.service';

describe('AdminTrackingsService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: AdminTrackingsService = TestBed.get(AdminTrackingsService);
    expect(service).toBeTruthy();
  });
});
