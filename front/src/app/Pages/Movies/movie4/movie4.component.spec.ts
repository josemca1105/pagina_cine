import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Movie4Component } from './movie4.component';

describe('Movie4Component', () => {
  let component: Movie4Component;
  let fixture: ComponentFixture<Movie4Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Movie4Component]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(Movie4Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
