import { TestBed } from '@angular/core/testing';

import { LogRegService } from './log-reg.service';

describe('LogRegService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: LogRegService = TestBed.get(LogRegService);
    expect(service).toBeTruthy();
  });
});
