import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Movie5Component } from './movie5.component';

describe('Movie5Component', () => {
  let component: Movie5Component;
  let fixture: ComponentFixture<Movie5Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Movie5Component]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(Movie5Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
