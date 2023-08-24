USE [turnstile]
GO

/****** Object:  Table [dbo].[seats]    Script Date: 8/23/2023 8:26:48 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[seats](
	[ride] [text] NOT NULL,
	[seats] [int] NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

